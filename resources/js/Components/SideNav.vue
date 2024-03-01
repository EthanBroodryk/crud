<script>

export default {

    props:{
   
        propName: {
            type: Array,
            required: true,
        },

        image: {
            type: Array,
            required: true,
        },

        categoryDropdown :{

            type:Array,
            required:true,

        },

        cartItems :{

            type:Array,
            required:true,

        },

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

<div class="bg-white text-white border border-gray-200 w-80 flex-none hidden lg:block">
        <!-- Side Nav Content -->
        <li class="border-gray-300 p-2 flex items-center justify-center">
            <img src=" data:image/png;base64,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" alt="Bell icon">
           
            <!-- <img :src="image" alt="Bell icon" class="h-6 w-6">  -->
            
        
        </li>
        <li class="p-4 border-gray-300 flex items-center justify-center text-gray-600">
            <img src=" data:image/png;base64,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" alt="Bell icon" class="h-6 w-6">
            Dashboard
        </li>
       
    </div>


</template>

