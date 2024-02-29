<script>

export default {

    props:{
   
        propName: {
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
            <img src="/images/3821e7372a6e5145c25735513d97e5ca.png" alt="Bell icon">
        </li>
        <li class="p-4 border-gray-300 flex items-center justify-center text-gray-600">
            <img src="/images/Untitled.png" alt="Bell icon" class="h-6 w-6">
            Dashboard
        </li>
        <li class="p-4 border-gray-300 flex items-center justify-center text-gray-600">
            <img src="/images/Untitled.png" alt="Bell icon" class="h-6 w-6">
            Dashboard
        </li>
    </div>


</template>

