<template>
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item container" data-ride="carousel">

        <!--Controls-->
        <div class="controls-top">
            <a class="btn-floating-prev color-chevron" href="#multi-item-example" data-slide="prev">
                <i class="fas fa-chevron-left fa-3x"></i>
            </a>
            <a class="btn-floating-next color-chevron" href="#multi-item-example" data-slide="next">
                <i class="fas fa-chevron-right fa-3x"></i>
            </a>
        </div>
        <!--/.Controls-->

        <!--Indicators-->
        <ol class="carousel-indicators">
            <!-- Creiamo tanti indicatori quante le slide -->
            <li v-for="i in Math.ceil(sponsored.length / cardsPerSlide)" data-target="#multi-item-example"
                :data-slide-to="(i - 1)" :class="(i === 1) ? 'active' : ''"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!-- Creiamo tante slide quanto il quoziente tra la lunghezza dell'array
            e il numero di card in ogni slide, inoltre se il cliente è sponsorizzato verrà visualizzato o meno -->

            <div>

                <div class="carousel-item" :class="(i === 1) ? 'active' : ''"
                    v-for="i, index in Math.ceil(sponsored.length / cardsPerSlide)">

                    <div class="row container d-flex flex-row p-2 flex-wrap">

                        <div class="card col-md-4 p-2 bd-highlight doctor-card"
                            :class="(i === 1) ? 'clearfix d-none d-md-block' : ''"
                            v-for="doctor in carouselLoop(i, sponsored)" v-if="doctor.sponsors.length > 0">

                            <div class="img-container">
                                <img class="card-img-top" :src="`storage/${doctor.detail.pic}`" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{doctor.name}} {{doctor.lastname}}</h4>
                                <h5 class="card-text">Specializzazioni:</h5>
                                <h6 class="card-text" v-for="department in doctor.departments">{{department.type}}</h6>
                                <a :href="`doctor/${doctor.id}`"
                                    class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register">Info</a>
                            </div>

                        </div>

                        <div class="card col-md-4 p-2 bd-highlight doctor-card" v-else>

                            <div class="img-container">
                                <img class="card-img-top"
                                    src="https://fscomps.fotosearch.com/compc/CSP/CSP283/wort-schreibende-text-hallo-ich-stock-foto__k73203227.jpg"
                                    alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Sponsorizza il tuo profilo</h4>
                            </div>

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
                sponsored: [],
                cardsPerSlide: ''
            }
        },

        mounted() {
            const self = this;

            /* Se lo schermo, al caricamento pagina, è di grandezza inferiore a 768px lo slider
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
                const today = Date.parse(new Date());

                self.results = resp.data.data;

                self.results.forEach(elem => {
                    if(elem.sponsors.length > 0) {
                        elem.sponsors.forEach(sponsor => {

                            // Verifichiamo che il medico abbia una sponsorizzazione in corso //
                            if(today <= (Date.parse(sponsor.created_at) + (sponsor.duration * 3600000))) {
                                self.sponsored.push(elem);
                            }
                        });
                    }
                });                                      
            });
        },

        methods: {

            /* Scomponiamo l'array di risultati per recuperare di volta in volta
            i valori con cui popolare le slide */
            carouselLoop: function (index, array) {
                const limit = this.cardsPerSlide;
                let start, end;

                end = index * limit;
                start = end - limit;

                return array.slice(start, end);
            },
        }
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
