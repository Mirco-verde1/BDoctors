<template>

  <div>



   <div class="container">

        <div class="form-inline">

            <input class="form-control mr-sm-2" placeholder="Search" type="search" name="" id="" v-model="searching" aria-label="Search">

            <button class="btn btn-outline-success my-2 my-sm-0" @click="searchDepartment()">
                    Cerca specializzazione
            </button>

            <a href="/advance">
                <button class="btn btn-outline-success my-2 my-sm-0">
                    Ricerca avanzata
                </button>
            </a>
        </div>

       <div v-for="(info,index) in results" :key="index">
        Nome: {{info.name}} {{info.lastname}}

       <div v-for="(obj, index) in info.departments" :key="index">
          Specializzazione: {{obj.type}}
      </div>

      
       <img :src="info.detail.pic" alt=""> 
      

    </div>



</div>



  </div>
</template>

<script>
  export default {


    data: function () {

      return {

        allInfo: [],

        results: [],

        searching: '',

      }

    },

    methods: {

      //ricerca departments home page
      searchDepartment: function () {
        const self = this;
        self.results = [];

        self.allInfo.data.forEach(elem => {

            elem.departments.forEach(item => {

                if(item.type.toLowerCase().includes(self.searching.toLowerCase())){

                    return self.results.push(elem);

                }
            })

        });

      }

    },

    mounted() {

      //all doctors data
      const self = this;
      axios.get('http://127.0.0.1:8000/api/doctors', {
          params: {

            query: self.searching,

          },
        })

        .then((resp) => {
          self.allInfo = resp.data;
        })


    },

  }

</script>
