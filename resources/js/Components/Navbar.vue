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

<div class="flex h-screen fixed">
    <!-- Side Nav -->
    <div class="flex flex-col w-1/6 bg-white border border-gray-300">
        <!-- List items -->

        <li class="border-gray-300 p-2 flex items-center justify-center">
            <img src="/images/3821e7372a6e5145c25735513d97e5ca.png" alt="Bell icon">
        </li>
        <li class="p-4 border-gray-300 flex items-center justify-center">
            <img src="/images/Untitled.png" alt="Bell icon" class="h-6 w-6">
        Dashboard
        </li>
        <li class="p-4 border-gray-300 flex items-center justify-center">
            <img src="/images/Untitled.png" alt="Bell icon" class="h-6 w-6">
        Dashboard
        </li>
    </div>

    <!-- Main Content -->
    <div class="flex flex-grow flex-col justify-center items-center bg-gray-100">
        <!-- Top Nav -->
        <div class="h-20 bg-white border-b border-gray-300 flex items-center justify-between w-full">
            <!-- Search input -->
            <input @input="showFiltered" type="text" placeholder="Search Products..." v-model="searchQuery" class="h-10 ml-20 border border-gray-200 rounded-full focus:outline-none focus:border-black mx-auto" />

            <!-- Logout button and bell icon -->
            <div class="flex items-center mr-4">
                <span class="p-4">Logout</span>
                <img src="/images/bell-icon.png" alt="Bell icon" class="h-6 w-6 ml-4">
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-grow justify-center items-center">
            <!-- Your main content goes here -->
            <h1 class="text-3xl font-semibold">Main Content Area</h1>
            <p>This is the main content area.</p>
        </div>
    </div>
</div>




</template>

