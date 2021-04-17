<template>

  <div>

    <div class="container">

      <div class="row">



    <div class="results" v-if="checkedResults.length === 0">

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


   <div v-if="checkedResults.length > 0">

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
    <input type="checkbox" name="palmira" value="palmira" v-model="checked">
    filtro name palmira


    <button @click="filterByCheck()">Applica Filtro</button>


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


        checked:[],

        checkedResults:[],

      }

    },

    methods: {

       //filter results by checkboxes
      filterByCheck:function(){

      const self = this;

       self.checkedResults=[];

            self.results.forEach(item => {

                 self.checked.forEach(elem => {

                    if(item.name.toLowerCase().includes(elem)){

                       self.checkedResults.push(item)


             }

                 });


        });


      },

    }

  }

</script>
