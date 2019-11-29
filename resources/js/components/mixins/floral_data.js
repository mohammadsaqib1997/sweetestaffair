export default {
  data() {
    return {
      flowers: [
        "Assorted Seasonal Flowers",
        "Roses",
        "Tulips",
        "Lilies",
        "Anthurium",
        "Chrysanthemums",
        "Baby’s Breath",
        "Ficus",
        "Eucalyptus"
      ],
      sizes: [
        {
          title: "Small (Rs.100)",
          pr: 100
        },
        {
          title: "Medium (Rs.150)",
          pr: 150
        },
        {
          title: "Large (Rs.200)",
          pr: 200
        }
      ],
      box_sizes_imgs: [
        [
          // for small images
          {
            img: "images/sizes/small/01.jpg",
            color: 'Mona Lisa',
            f_img: 'images/sizes/small/f-01.jpg'
          },
          {
            img: "images/sizes/small/02.jpg",
            color: 'Light Pink',
            f_img: 'images/sizes/small/f-02.jpg'
          },
          {
            img: "images/sizes/small/03.jpg",
            color: 'Storm Grey',
            f_img: 'images/sizes/small/f-03.jpg'
          }
        ],
        [
          // for medium images
          {
            img: "images/sizes/medium/04.jpg",
            color: 'Shady Lady',
            f_img: 'images/sizes/medium/f-04.jpg'
          },
          {
            img: "images/sizes/medium/02.jpg",
            color: 'Light Pink',
            f_img: 'images/sizes/medium/f-02.jpg'
          }
        ],
        [
          // for large images
          {
            img: "images/sizes/large/01.jpg",
            color: 'Light Pink',
            f_img: "images/sizes/large/f-01.jpg",
          },
          {
            img: "images/sizes/large/02.jpg",
            color: 'Textured White',
            f_img: "images/sizes/large/f-02.jpg",
          },
          {
            img: "images/sizes/large/03.jpg",
            color: 'Storm Grey',
            f_img: "images/sizes/large/f-03.jpg",
          },
          {
            img: "images/sizes/large/04.jpg",
            color: 'Mandys Pink',
            f_img: "images/sizes/large/f-04.jpg",
          },
          {
            img: "images/sizes/large/05.jpg",
            color: 'Light Slate Grey',
            f_img: "images/sizes/large/f-05.jpg",
          }
        ]
      ],
      sweets: [
        {
          title: "Assorted French Artisanal Chocolates (Rs.100) ",
          pr: 100
        },
        {
          title: "Chocolate Dipped Strawberries (Rs.150) ",
          pr: 150
        },
        {
          title: "Chocolate Dipped Seasonal Fruits (Rs.200) ",
          pr: 200
        },
        {
          title: "Chocolate Pretzels (Rs.250) ",
          pr: 250
        },
        {
          title: "Dates(Ajwa) (Rs.350) ",
          pr: 350
        },
        {
          title: "Nuts (Rs.300) ",
          pr: 300
        }
      ],
      gifts: [
        {
          title: "Balloons (Rs.100) ",
          pr: 100
        },
        {
          title: "Soy Candles (Rs.150) ",
          pr: 150
        }
      ],
    }
  }
}