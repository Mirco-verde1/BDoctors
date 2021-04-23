<template>
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item container" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating-prev" href="#multi-item-example" data-slide="prev">
                <i class="fas fa-chevron-left fa-3x"></i>
            </a>
            <a class="btn-floating-next" href="#multi-item-example" data-slide="next">
                <i class="fas fa-chevron-right fa-3x" @click="Test()"></i>
            </a>
        </div>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
            <!-- Creiamo tanti indicatori quante le slide -->
            <li v-for="i in Math.ceil(results.length / cardsPerSlide)" data-target="#multi-item-example" :data-slide-to="(i - 1)" :class="(i === 1) ? 'active' : ''"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- Creiamo tante slide quanto il quoziente tra la lunghezza dell'array
            e il numero di card in ogni slide, inoltre se il cliente è sponsorizzato verrà visualizzato o meno -->

<div>


            <div class="carousel-item" :class="(i === 1) ? 'active' : ''" v-for="i in Math.ceil(results.length / cardsPerSlide)"  >

                <div class="row container d-flex flex-row p-2 flex-wrap">
                    <div class="card col-md-4 p-2 bd-highlight doctor-card" :class="(i === 1) ? 'clearfix d-none d-md-block' : ''" v-for="doctor in carouselLoop(i, results)"
                    v-if="doctor.sponsors.length > 0">

                        <div class="img-container" >
                            <img class="card-img-top" :src="`storage/${doctor.detail.pic}`" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{doctor.name}} {{doctor.lastname}}</h4>
                            <h5 class="card-text">Specializzazioni:</h5>
                            <h6 class="card-text" v-for="department in doctor.departments">{{department.type}}</h6>
                            <a :href="`doctor/${doctor.id}`" class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register">Info</a>
                        </div>

                    </div>
                </div>
            </div>

            </div>
        </div>
        <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->
</template>

<script>
    export default {

        data: function () {

            return {
                results: [],
                sponsorized:[],
                cardsPerSlide: ''
            }
        },

        mounted() {
            const self = this;

            /* Se lo schermo è di grandezza inferiore a 768px lo slider
            riporta 1 card per volta, altrimenti 3 */
            if (window.matchMedia('(max-width: 768px)').matches) {
                self.cardsPerSlide = 1;
            } else {
                self.cardsPerSlide = 3;
            }

            // Chiamata Axios all'API
            axios.get('http://127.0.0.1:8000/api/doctors', {
            })
            .then((resp) => {
                self.results = resp.data.data;
                console.log(self.results);
            });
        },

        methods: {

            /* Scomponiamo l'array di risultati per recuperare di volta in volta
            i valori con cui popolare le slide */
            carouselLoop: function(index, array) {
                const limit = this.cardsPerSlide;
                let start, end;

                end = index * limit;
                start = end - limit;

                return array.slice(start, end);
            },


             Test:function(){

            this.results.forEach(element => {
                console.log(element.sponsors.length);
            });
        }
        },




    }
</script>

<style scoped>
    .img-container {
        width: 300px;
    }

    .card-img-top {
        width: 100%;
    }
</style>
