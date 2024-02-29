<script setup>
import { useForm,usePage,Link } from '@inertiajs/vue3';
</script>

<script>

export default {


   
    props:{

      profile_image:String,
      bell_icon:String,

    },


    

    data(){

        return {
            image_file_name:'/home/ethan/Documents/crud3/public/images.png',
            mobileMenuOpen:false,
            gategoryDropdown:false,
            searchBar:false,
            links:[],
            cartItemCount:0,

        }
    },

    setup(){

    },

    computed: {
  
    },

    mounted(){
        this.cartItemCount = localStorage.getItem('cartItemCount')
    },

    methods:{

    

        toggleButton(){
            if(this.mobileMenuOpen == false){
                this.mobileMenuOpen = true
            }else{
                this.mobileMenuOpen = false
            }
        },
        toggleCatButton(){
            if(this.gategoryDropdown == false){
                this.gategoryDropdown = true
                console.log('catebutton',this.gategoryDropdown)
            }else{
                this.gategoryDropdown = false
                console.log('catebutton',this.gategoryDropdown)
            }
        },
        toggleSearchButton(){
            if(this.searchBar == false){
                this.searchBar = true
            }else{
                this.searchBar = false
            }
        },
    }
}
</script>

<template>





</template>

