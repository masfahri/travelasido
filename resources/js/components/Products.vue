<template>
   <div>
      <b-carousel id="carousel-1" v-model="slide" :interval="3000" controls indicators background="#ababab" img-width="1024" img-height="480" style="text-shadow: 1px 1px 2px #333;" @sliding-start="onSlideStart" @sliding-end="onSlideEnd">
         <!-- Text slides with image -->
         <b-carousel-slide
         caption="First slide"
         text="Nulla vitae elit libero, a pharetra augue mollis interdum."
         img-src="https://picsum.photos/1024/480/?image=52"
         ></b-carousel-slide>

         <!-- Slides with custom text -->
         <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
         <h1>Hello world!</h1>
         </b-carousel-slide>

         <!-- Slides with image only -->
         <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>

         <!-- Slides with img slot -->
         <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
         <b-carousel-slide>
         <template v-slot:img>
            <img
               class="d-block img-fluid w-100"
               width="1024"
               height="480"
               src="https://picsum.photos/1024/480/?image=55"
               alt="image slot"
            >
         </template>
         </b-carousel-slide>

         <!-- Slide with blank fluid image to maintain slide aspect ratio -->
         <b-carousel-slide caption="Blank Image" img-blank img-alt="Blank image">
         <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eros felis, tincidunt
            a tincidunt eget, convallis vel est. Ut pellentesque ut lacus vel interdum.
         </p>
         </b-carousel-slide>
      </b-carousel>
      <b-container>
         <b-row>
            <b-col cols="12" sm="4" lg="3" xl="3" md="4">
               <div>
                  <b-card
                     title="Card Title"
                     img-src="https://picsum.photos/600/300/?image=25"
                     img-alt="Image"
                     img-top
                     tag="article"
                     style="max-width: 20rem;"
                     class="mb-2"
                  >
                     <b-card-text>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                     </b-card-text>

                     <b-button href="#" variant="primary">Go somewhere</b-button>
                  </b-card>
               </div>
            </b-col>
            <b-col cols="12" sm="4" lg="3" xl="3" md="4">
               <div>
                  <b-card
                     title="Card Title"
                     img-src="https://picsum.photos/600/300/?image=25"
                     img-alt="Image"
                     img-top
                     tag="article"
                     style="max-width: 20rem;"
                     class="mb-2"
                  >
                     <b-card-text>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                     </b-card-text>

                     <b-button href="#" variant="primary">Go somewhere</b-button>
                  </b-card>
               </div>
            </b-col>
            <b-col cols="12" sm="4" lg="3" xl="3" md="4">
               <div>
                  <b-card
                     title="Card Title"
                     img-src="https://picsum.photos/600/300/?image=25"
                     img-alt="Image"
                     img-top
                     tag="article"
                     style="max-width: 20rem;"
                     class="mb-2"
                  >
                     <b-card-text>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                     </b-card-text>

                     <b-button href="#" variant="primary">Go somewhere</b-button>
                  </b-card>
               </div>
            </b-col>
            <b-col cols="12" sm="4" lg="3" xl="3" md="4">
               <div>
                  <b-card
                     title="Card Title"
                     img-src="https://picsum.photos/600/300/?image=25"
                     img-alt="Image"
                     img-top
                     tag="article"
                     style="max-width: 20rem;"
                     class="mb-2"
                  >
                     <b-card-text>
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                     </b-card-text>

                     <b-button href="#" variant="primary">Go somewhere</b-button>
                  </b-card>
               </div>
            </b-col>
         </b-row>
      </b-container>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>