<template>
  <div id="v-app" class="row my-5">
    <div class="col-md-5">
      <img class="img-fluid" v-if="gallery.length < 1" :src="mainImg" alt />
      <div v-else-if="gallery.length > 0" class="slider mt-4 mt-md-0">
        <img
          v-for="(img, ind) in gallery"
          :key="ind"
          class="img-fluid lazy"
          :data-src="baseUrl+img"
          alt
        />
      </div>
    </div>
    <div class="col-md">
      <div class="form mt-4 mt-md-0">
        <div class="form-group" v-if="form_error !== ''">
          <p class="text-danger">{{ form_error }}</p>
        </div>
        <!-- form dynamic -->
        <template v-for="(vrt, ind) in variations">
          <!-- select -->
          <select-input
            ref="dyn-form"
            :key="ind"
            v-if="vrt['type'] == 'select'"
            :options="vrt['options']"
            :label="vrt['label']"
            :small="vrt['small']"
            @update_input="update_total"
          />
          <!-- select -->
          <!-- radio buttons -->
          <radio-input
            ref="dyn-form"
            :key="ind"
            :fm_ind="ind"
            v-else-if="vrt['type'] == 'radio'"
            :options="vrt['options']"
            :label="vrt['label']"
            :small="vrt['small']"
            @update_input="update_total"
          />
          <!-- radio buttons -->
          <!-- text input -->
          <text-input
            ref="dyn-form"
            :key="ind"
            v-else-if="vrt['type'] == 'text'"
            :options="vrt['options']"
            :label="vrt['label']"
            :small="vrt['small']"
            @update_input="update_total"
          />
          <!-- text input -->
        </template>
        <!-- form dynamic -->

        <div class="form-group">
          <label for>Quantity</label>
          <input
            type="number"
            v-model="form.qty"
            :class="{'invalid': validation.hasError('form.qty')}"
            class="form-control"
            min="1"
            max="10"
          />
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.qty')"
          >{{ validation.firstError('form.qty') }}</p>
        </div>

        <div class="form-row my-5 mx-0 gr-total">
          <div class="col-12">
            <div class="row mx-0">
              <div class="col">
                <label class="my-2">Product Price</label>
              </div>
              <div class="col text-right">
                <label class="my-2">{{ prd_qty > 1 ? 'x'+prd_qty+' ': '' }}Rs. {{ pr_price }}/-</label>
              </div>
            </div>
            <div v-if="form.delivery_type == 'Deliver'" class="row mx-0">
              <div class="col">
                <label class="my-2">Delivery Charges</label>
              </div>
              <div class="col text-right">
                <label class="my-2">Rs. {{ selected_zone_price }}/-</label>
              </div>
            </div>

            <div class="row mx-0 border-top">
              <div class="col">
                <label class="my-2">Grand Total</label>
              </div>
              <div class="col text-right">
                <label class="my-2">Rs. {{ pr_total }}/-</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Delivery or Pickup -->
        <div class="form-group">
          <label class="d-block" for>Select Delivery Type</label>
          <div class="custom-control custom-radio custom-control-inline">
            <input
              type="radio"
              id="delivery_type_deliver"
              name="delivery_type"
              v-model="form.delivery_type"
              value="Deliver"
              class="custom-control-input"
            />
            <label class="custom-control-label" for="delivery_type_deliver">Deliver</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input
              type="radio"
              id="delivery_type_pickup"
              name="delivery_type"
              v-model="form.delivery_type"
              value="Pickup"
              class="custom-control-input"
            />
            <label class="custom-control-label" for="delivery_type_pickup">Pickup</label>
          </div>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.delivery_type')"
          >{{ validation.firstError('form.delivery_type') }}</p>
        </div>

        <div v-if="form.delivery_type == 'Deliver'" class="form-group">
          <label class="d-block" for>Select Zone</label>
          <select v-model="form.sel_zone" class="form-control">
            <option value>Select Zone</option>
            <option
              v-for="(val, ind) in delivery_charges"
              :key="ind"
              :value="val.label"
            >{{ val.label }}</option>
          </select>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_zone')"
          >{{ validation.firstError('form.sel_zone') }}</p>
        </div>

        <div class="form-group">
          <label for>{{ delr_type_text }} Date/Time</label>
          <div class="form-row">
            <div class="col">
              <input
                type="text"
                id="datepicker"
                autocomplete="off"
                class="form-control"
                placeholder="Select Date"
              />
            </div>
            <div class="col">
              <select v-model="form.sel_time" class="form-control">
                <option value>Select Time</option>
                <option value="9am-12pm">Between 9am - 12pm</option>
                <option value="12pm-3pm">Between 12pm - 3pm</option>
                <option value="3pm-6pm">Between 3pm - 6pm</option>
                <option value="6pm-9pm">Between 6pm - 9pm</option>
              </select>
            </div>
            <div class="w-100"></div>
            <p
              class="text-danger small mt-1"
              v-if="validation.hasError('form.sel_date') || validation.hasError('form.sel_time')"
            >{{ validation.firstError('form.sel_date') || validation.firstError('form.sel_time') }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for>Personal Message</label>
          <textarea
            name
            class="form-control"
            v-model="form.message"
            id
            rows="3"
            placeholder="Any comments ..."
          ></textarea>
        </div>

        <!-- customer information -->
        <h3
          class="mb-3 mt-5"
        >{{ form.delivery_type == "Deliver" ? 'Shipping': 'Personal' }} Information</h3>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for>Name</label>
              <input
                type="text"
                class="form-control"
                v-model="form.name"
                placeholder="Enter your name"
              />
              <p
                class="text-danger small mt-1"
                v-if="validation.hasError('form.name') || validation.hasError('form.name')"
              >{{ validation.firstError('form.name') || validation.firstError('form.name') }}</p>
            </div>
            <div class="col">
              <label for>Phone</label>
              <input
                type="text"
                class="form-control"
                v-model="form.phone"
                placeholder="Enter your phone number"
              />
              <p
                class="text-danger small mt-1"
                v-if="validation.hasError('form.phone') || validation.hasError('form.phone')"
              >{{ validation.firstError('form.phone') || validation.firstError('form.phone') }}</p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for>Email</label>
          <input
            type="text"
            class="form-control"
            v-model="form.email"
            placeholder="Enter your email"
          />
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.email') || validation.hasError('form.email')"
          >{{ validation.firstError('form.email') || validation.firstError('form.email') }}</p>
        </div>

        <div v-if="form.delivery_type == 'Deliver'" class="form-group">
          <label for>Shipping Address</label>
          <textarea
            name
            class="form-control"
            v-model="form.address"
            id
            rows="3"
            placeholder="enter your address"
          ></textarea>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.address') || validation.hasError('form.address')"
          >{{ validation.firstError('form.address') || validation.firstError('form.address') }}</p>
        </div>
        <!-- customer information -->

        <div class="form-group">
          <button @click="submit" class="btn thm-btn" :disabled="form_process == true">
            Let's Lock It &nbsp;&nbsp;
            <i class="fas fa-shopping-cart"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SelectInput from "./select-input";
import RadioInput from "./radio-input";
import TextInput from "./text-input";
import moment from "moment";
import SimpleVueValidation from "simple-vue-validator";
const Validator = SimpleVueValidation.Validator;
export default {
  components: {
    "select-input": SelectInput,
    "radio-input": RadioInput,
    "text-input": TextInput,
  },
  props: ["appData"],
  computed: {
    has_delr: function () {
      return this.form.delivery_type == "Deliver";
    },
    delr_type_text: function () {
      if (this.has_delr) {
        return "Delivery";
      }
      return this.form.delivery_type;
    },
    selected_zone_price: function () {
      if (this.form.sel_zone != "") {
        return this.delivery_charges[this.form.sel_zone].price;
      }
      return 0;
    },
    prd_qty: function () {
      if (!isNaN(this.form.qty) && !this.validation.hasError("form.qty")) {
        return parseInt(this.form.qty);
      }
      return 0;
    },
    mainImg: function () {
      return this.baseUrl + this.select_main_img;
    },
    pr_price: function () {
      const self = this;
      let pr = self.base_price;
      if (self.var_price !== "") {
        pr += self.var_price;
      }
      return pr;
    },
    pr_total: function () {
      const self = this;
      let pr = self.pr_price;

      if (self.prd_qty !== 0) {
        pr = parseInt(self.prd_qty) * pr;
      } else {
        pr = 0;
      }

      if (self.has_delr) {
        pr += self.selected_zone_price;
      }
      return pr;
    },
  },
  mounted() {
    const self = this;
    const appData = JSON.parse(this.appData);
    self.product_id = appData.id;
    self.select_main_img = appData.img;
    self.title = appData.title;
    self.variations = appData.variations;
    self.base_price = appData.hasOwnProperty("base_price")
      ? appData["base_price"]
      : 0;
    if (appData.hasOwnProperty("gallery")) {
      self.gallery = appData.gallery;
      $("document").ready(function () {
        $(".slider").on("beforeChange", function (event, slick) {
          $(".lazy").Lazy();
        });
        $(".slider").slick({
          infinite: true,
          arrows: false,
          draggable: true,
          dots: true,
          autoplay: true,
          autoplaySpeed: 3000,
        });
      });
    }
    self.baseUrl =
      document.head.querySelector('meta[name="base-url"]').content + "/";

    self.datepicker_set();
  },
  watch: {
    delr_type_text: function () {
      this.datepicker_set();
      this.form.sel_zone = "";
      this.form.address = "";
    },
  },
  data() {
    return {
      form_process: false,
      form_error: "",
      baseUrl: "/",
      title: "",
      select_main_img: "",
      gallery: [],
      variations: [],
      delivery_charges: {
        DHA: {
          label: "DHA",
          price: 750,
        },
        Clifton: {
          label: "Clifton",
          price: 750,
        },
        PECHS: {
          label: "PECHS",
          price: 750,
        },
        Other: {
          label: "Other",
          price: 1250,
        },
      },
      var_price: 0,
      base_price: 0,
      product_id: null,
      form: {
        qty: 1,
        sel_date: "",
        sel_time: "",
        message: "",
        name: "",
        phone: "",
        email: "",
        address: "",
        delivery_type: "Deliver",
        sel_zone: "",
      },
    };
  },
  validators: {
    "form.qty": function (value) {
      let validator = Validator.value(value).required();
      if (!validator.hasImmediateError()) {
        validator.custom(function () {
          const regex = new RegExp(/^([1-9]|10)$/);
          if (!regex.test(value)) {
            return "Order between (1 - 10)";
          }
        });
      }
      return validator;
    },
    "form.sel_date": function (value) {
      return Validator.value(value).required();
    },
    "form.sel_time": function (value) {
      return Validator.value(value).required();
    },
    "form.message": function (value) {
      return Validator.value(value).maxLength(500);
    },
    "form.name": function (value) {
      return Validator.value(value).required();
    },
    "form.phone": function (value) {
      return Validator.value(value).required();
    },
    "form.email": function (value) {
      return Validator.value(value).required();
    },
    "form.address": function (value) {
      let validator = Validator.value(value);
      if (this.has_delr) {
        validator.required();
      }
      return validator;
    },
    "form.delivery_type": function (value) {
      return Validator.value(value).required();
    },
    "form.sel_zone": function (value) {
      let validator = Validator.value(value);
      if (this.has_delr) {
        validator.required();
      }
      return validator;
    },
  },
  methods: {
    submit: async function () {
      const self = this;
      self.form_error = "";
      self.form_process = true;
      let selected_variations = [];
      let has_variation_success = false;
      if (self.$refs.hasOwnProperty("dyn-form")) {
        selected_variations = await Promise.all(
          self.$refs["dyn-form"].map(function (form) {
            return form.validate();
          })
        ).then(function (variations) {
          return variations.filter(function (variation) {
            return typeof variation !== "undefined";
          });
        });
      }

      if (self.$refs.hasOwnProperty("dyn-form")) {
        if (self.$refs["dyn-form"].length == selected_variations.length) {
          has_variation_success = true;
        }
      } else {
        has_variation_success = true;
      }

      await self.$validate().then(function (success) {
        if (success && has_variation_success) {
          axios
            .post(self.baseUrl + "order-submit", {
              ...self.form,
              delivery_charges: self.selected_zone_price,
              selected_variations,
              product_id: self.product_id,
              pr_price: self.pr_price,
              pr_total: self.pr_total,
            })
            .then((res) => {
              if (res.data.status === "ok") {
                window.location.href = res.data.link;
              } else {
                self.form_error_evt("Server Error! Please try again!");
              }
            })
            .catch((err) => {
              console.log(err);
              self.form_error_evt(err.message);
            })
            .finally(() => {
              self.form_process = false;
            });
        } else {
          self.form_process = false;
        }
      });
    },
    form_error_evt: function (err) {
      this.form_error = err;
      $("html, body")
        .stop()
        .animate({ scrollTop: $("#v-app").offset().top }, 500, "swing");
    },
    update_total: function (e) {
      this.var_price = this.var_price - e["old"];
      this.var_price = this.var_price + e["price"];
    },
    datepicker_set: function () {
      const self = this;
      $(function () {
        $("#datepicker")
          .datepicker({
            autoclose: true,
            startDate: new Date(),
          })
          .on("changeDate", function (evt) {
            self.form.sel_date = moment(evt.date).format("YYYY-MM-DD");
          })
          .on("hide", function (evt) {
            if (typeof evt.date === "undefined") {
              self.form.sel_date = "";
            }
          });
        if (self.form.sel_date != "") {
          $("#datepicker").datepicker("setDate", new Date(self.form.sel_date));
        }
      });
    },
  },
};
</script>

<style lang="scss">
.img-cont {
  border-radius: 5px;
  overflow: hidden;
  box-shadow: 0 1px 2px 0px #848484;
  border: 2px solid white;
  cursor: pointer;
  &.active {
    border-color: #e1c16c;
    box-shadow: 0 2px 6px 0px #848484;
  }
}

.gr-total {
  border-top: 1px solid #cacaca;
  border-bottom: 1px solid #cacaca;
}

.invalid {
  border-color: #dc3545;
}

.sel-size {
  text-align: center;
  line-height: 18px;
}

.color {
  font-size: 15px;
  margin: 8px 0 15px;
  display: block;
}
</style>