<template>
  <div id="v-app" class="row my-5">
    <div class="col-md-5">
      <h3 class="display-5">Flower Box</h3>
      <img class="img-fluid mt-4" :src="mainImg" alt />
      <div class="d-none d-md-block">
        <hr class="mt-5" />
        <h3 class="display-5">Luxury Rose Boxes</h3>
        <div class="link-img mt-4 position-relative">
          <img
            :data-src="baseUrl + 'images/floral/luxury-box/prd-2.jpg'"
            class="lazy img-fluid"
            alt
          />
          <a :href="baseUrl+'product/luxury-box'" class="stretched-link"></a>
        </div>
        <hr class="mt-5" />
        <h3 class="display-5">Special Occasion Florals</h3>
        <div class="link-img mt-4 position-relative">
          <img :data-src="baseUrl + 'images/sp-ocat-1.jpeg'" class="lazy img-fluid" alt />
          <a :href="baseUrl+'special-occasions'" class="stretched-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="form mt-4 mt-md-0">
        <div class="form-group">
          <label for>
            Choice Of Preferred Flowers
            <small>(Subject to Availability)</small>
          </label>
          <select
            v-model="form.sel_flower"
            id
            class="form-control"
            :class="{'invalid': validation.hasError('form.sel_flower')}"
          >
            <option value>Select Flowers</option>
            <option v-for="(item, ind) in flowers" :key="ind" :value="ind">{{ item }}</option>
          </select>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_flower')"
          >{{ validation.firstError('form.sel_flower') }}</p>
        </div>
        <div class="form-group">
          <label for="box-size">Box Size</label>
          <select
            v-model="form.sel_size"
            @change="changeSize"
            id="box-size"
            class="form-control"
            :class="{'invalid': validation.hasError('form.sel_size')}"
          >
            <option value>Select Size</option>
            <option v-for="(item, ind) in sizes" :key="ind" :value="ind">{{ item.title }}</option>
          </select>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_size')"
          >{{ validation.firstError('form.sel_size') }}</p>
        </div>
        <div class="form-row mb-3" v-if="form.sel_size !== ''">
          <div
            v-for="(item, ind) in box_sizes_imgs[form.sel_size]"
            :key="ind"
            class="col-4 col-sm-2 sel-size"
          >
            <div
              class="img-cont"
              :class="{'active': item.img == form.sel_box_img}"
              @click="selectBoxSizeImg(item)"
            >
              <img :src="(baseUrl+item.img)" class="img-fluid" alt :key="ind" />
            </div>
            <strong class="color">{{ item.color }}</strong>
          </div>
          <div class="w-100"></div>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_box_img')"
          >{{ validation.firstError('form.sel_box_img') }}</p>
        </div>
        <div class="form-group">
          <label for>Sweet Selection</label>
          <select
            v-model="form.sel_sweet"
            id
            class="form-control"
            :class="{'invalid': validation.hasError('form.sel_sweet')}"
          >
            <option value>Select Sweets</option>
            <option v-for="(item, ind) in sweets" :key="ind" :value="ind">{{ item.title }}</option>
          </select>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_sweet')"
          >{{ validation.firstError('form.sel_sweet') }}</p>
        </div>
        <div class="form-group">
          <label for>Add a Gift</label>
          <select v-model="form.sel_gift" id class="form-control">
            <option value>Select Gift</option>
            <option v-for="(item, ind) in gifts" :key="ind" :value="ind">{{ item.title }}</option>
          </select>
          <p
            class="text-danger small mt-1"
            v-if="validation.hasError('form.sel_gift')"
          >{{ validation.firstError('form.sel_gift') }}</p>
        </div>
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
        <div class="form-row my-3 mx-0 gr-total">
          <div class="col">
            <label class="my-2">Grand Total</label>
          </div>
          <div class="col text-right">
            <label class="my-2">Rs. {{ pr_total }}/-</label>
          </div>
        </div>
        <div class="form-group">
          <label for>Delivery Date/Time</label>
          <div class="form-row mx-0">
            <div class="col">
              <input type="text" id="datepicker" class="form-control" placeholder="Select Date" />
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
          <textarea name class="form-control" id rows="3" placeholder="Any comments ..."></textarea>
        </div>

        <div class="form-group">
          <button @click="submit" class="btn thm-btn">Add To Cart</button>
        </div>
      </div>
      <div class="d-block d-md-none">
        <hr class="mt-5" />
        <h3 class="display-5">Luxury Rose Boxes</h3>
        <div class="link-img mt-4 position-relative">
          <img
            :data-src="baseUrl + 'images/floral/luxury-box/prd-1.jpg'"
            class="lazy img-fluid"
            alt
          />
          <a :href="baseUrl+'product/luxury-box'" class="stretched-link"></a>
        </div>
        <hr class="mt-5" />
        <h3 class="display-5">Special Occasion Florals</h3>
        <div class="link-img mt-4 position-relative">
          <img :data-src="baseUrl + 'images/sp-ocat-1.jpeg'" class="lazy img-fluid" alt />
          <a :href="baseUrl+'special-occasions'" class="stretched-link"></a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import prdMixin from "./mixins/floral_data.js";
import SimpleVueValidation from "simple-vue-validator";
const Validator = SimpleVueValidation.Validator;
export default {
  mixins: [prdMixin],
  computed: {
    mainImg: function() {
      return this.baseUrl + this.select_main_img;
    },
    pr_total: function() {
      const self = this;
      let pr = 0;
      if (self.form.sel_size !== "") {
        pr += self.sizes[self.form.sel_size].pr;
      }
      if (self.form.sel_sweet !== "") {
        pr += self.sweets[self.form.sel_sweet].pr;
      }
      if (self.form.sel_gift !== "") {
        pr += self.gifts[self.form.sel_gift].pr;
      }
      if (self.form.qty !== "") {
        if (!isNaN(self.form.qty) && !self.validation.hasError("form.qty")) {
          pr = parseInt(self.form.qty) * pr;
        }
      }
      return pr;
    }
  },
  mounted() {
    const self = this;
    self.baseUrl =
      document.head.querySelector('meta[name="base-url"]').content + "/";
    $("#datepicker")
      .datepicker({
        autoclose: true,
        startDate: new Date()
      })
      .on("changeDate", function(evt) {
        self.form.sel_date = evt.date;
      })
      .on("hide", function(evt) {
        if (typeof evt.date === "undefined") {
          self.form.sel_date = "";
        }
      });
  },
  data() {
    return {
      baseUrl: "/",
      select_main_img: "images/floral/prd-1.jpg",
      form: {
        sel_flower: "",
        sel_size: "",
        sel_box_img: "",
        sel_sweet: "",
        sel_gift: "",
        qty: 1,
        sel_date: "",
        sel_time: ""
      }
    };
  },
  validators: {
    "form.sel_flower": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_size": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_box_img": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_sweet": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_gift": function(value) {
      return Validator.value(value).required();
    },
    "form.qty": function(value) {
      let validator = Validator.value(value).required();
      if (!validator.hasImmediateError()) {
        validator.custom(function() {
          const regex = new RegExp(/^([1-9]|10)$/);
          if (!regex.test(value)) {
            return "Order between (1 - 10)";
          }
        });
      }
      return validator;
    },
    "form.sel_date": function(value) {
      return Validator.value(value).required();
    },
    "form.sel_time": function(value) {
      return Validator.value(value).required();
    }
  },
  methods: {
    changeSize() {
      this.form.sel_box_img = "";
      // this.select_main_img = "images/floral/prd-1.jpg";
    },
    selectBoxSizeImg(item) {
      this.form.sel_box_img = item.img;
      // this.select_main_img = item.f_img;
    },
    submit: function() {
      this.$validate().then(function(success) {
        if (success) {
          alert("Order Complete.");
        }
      });
    }
  }
};
</script>

<style lang="scss" scoped>
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