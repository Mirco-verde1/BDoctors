<template>

<div>
    <input type="text" name="" id="" v-model="searching">

    <button @click="searchDepartment()">cerca</button>

        <div v-for="(info,index) in results"
        :key="index">

        {{info.department}}
        {{info.name}}


</div>

</div>
</template>

<script>

export default {


    data:function(){

     return{

     allInfo:[],

      results:[],

      searching:'',


}

    },

    methods: {

//ricerca departments home page
    searchDepartment:function(){
        const self = this;
        self.results=[];

        self.allInfo.forEach(elem => {

            if (elem.department.toLowerCase().includes(self.searching.toLowerCase())){

              self.results.push(elem);
            }

            else

            {


            }


        });
    }
    },

    mounted() {

//all doctors data
  const self = this;
      axios.get('http://127.0.0.1:8000/api/doctors',{
        params:{

          query: self.searching,

        },
      })

      .then((resp) => {
        self.allInfo = resp.data
      })


    },
}
</script>
