<template>

  <div>

    <div class="container">

      <div class="row">



    <div class="results" v-if="checkedVotes.length === 0">

   <h5 v-if="results.length === 0">Nessun risultato corrisponde ai tuoi criteri di ricerca.</h5>

        <div v-for="(doctor,index) in results" :key="index">
          Nome: {{doctor.name}} {{doctor.lastname}}

          <div v-for="(obj, index) in doctor.departments" :key="index">
            Specializzazione: {{obj.type}}
          </div>

          <img :src="doctor.detail.pic" alt="profile pic">



        </div>
   </div>


<!-- mostriamo i risultati della ricerca tramite filtri  -->


   <div v-if="checkedVotes.length > 0">

      <div v-for="(item,index) in checkedResults" :key="index">
          Nome: {{item.name}} {{item.lastname}}

          <div v-for="(obj, index) in item.departments" :key="index">
            Specializzazione: {{obj.type}}
          </div>

          <img :src="item.detail.pic" alt="profile pic">



        </div>


   </div>

<!-- Filter results part -->
  <div class="filters">

  <div> <input type="radio"  value="1" v-model="checkedVote"> <span>vote 1</span></div>
  <div> <input type="radio"  value="2" v-model="checkedVote"> <span>vote 2</span></div>
  <div> <input type="radio"  value="3" v-model="checkedVote"> <span>vote 3</span></div>
  <div> <input type="radio"  value="4" v-model="checkedVote"> <span>vote 4</span></div>
  <div> <input type="radio"  value="5" v-model="checkedVote"> <span>vote 5</span></div>



    <button @click="filterByVote(),filterByReview()">Applica Filtro</button>


  </div>

  <div>

   <input type="checkbox" name="" id="">

  </div>

     </div>

   </div>

  </div>

</template>

<script>


  export default {

    data: function () {

      return {

        // Recupera la stringa JSON dallo storage locale e la trasforma in un oggetto JavaScript
        results: JSON.parse(localStorage.getItem('results')),


        checkedVote:'',
        checkedReview:'',

        checkedVotes:[],
        checkedReviews:[],


      }

    },

    methods: {

       //filter results by checkboxes
      filterByVote:function(){

      const self = this;

       self.checkedVotes=[];

            self.results.forEach(item => {

               item.votes.forEach(el => {


                    if(el.value === parseInt(self.checked)){

                       self.checkedVotes.push(item)


             }


               });



        });


      },


      filterByReview:function(){

         self.checkedReviews=[];

          self.results.forEach(element => {

             let len = element.reviews.length;
             console.log(len);
          });
      }

    }

  }

</script>
