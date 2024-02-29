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
    <table class="table-auto border-collapse w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Title</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Role</th>
                <th class="px-4 py-2 text-left"></th>
            </tr>
        </thead>
        <tbody>
        <tr v-for="(risk,index) in   filteredProducts" class="bg-white">
            <td class="px-4 py-2 border">
                <input type="text" v-model="risk.name" class="rounded px-2 py-1 w-full" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index">
            </td>
            <td class="px-4 py-2 border">
                <input type="text" v-model="risk.title" class="rounded px-2 py-1 w-full" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index">

            </td>
            <td class="px-4 py-2 border">
                <input type="email" v-model="risk.email" class="rounded px-2 py-1 w-full" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index">
            </td>
            <td class="px-4 py-2 border">
                <select v-model="risk.role" class="rounded px-2 py-1 w-full" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }"   :disabled="isDisabled != index">
                    <option value="owner">Owner</option>
                    <option value="client">Client</option>
                </select>
            </td>
            <td class="px-4 py-2 border">
                <div class="flex items-center">
                    <Link v-if="isDisabled !== index" class="mr-4" :href="route('riskProfileDelete')" method="post" :data="{risk_id:risk.id}">
                        <img src="/images/trashcan.png" alt="Trashcan icon" class="h-6 w-6">
                    </Link>
                    <button v-if="isDisabled !== index" @click="disable(index)" class="px-2"><img src="/images/pen.png" alt="Pen icon" class="h-6 w-6"></button>
                    <button v-if="isDisabled !== index"  class="px-2"><img src="/images/eye.png" alt="Eye icon" class="h-6 w-6"></button>
                    <!-- <button v-if="isDisabled == index" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Save</button> -->
                    <Link @click="closeModal()" v-if="isDisabled == index" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" :href="route('riskProfileUpdate')" method="post"  :data="{risk_id:risk.id,name:risk.name,title:risk.title,role:risk.role,email:risk.email}">Save</Link>
                    <button @click="cancel(index)" v-if="isDisabled == index" class="px-4 ml-10 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>

                </div>
            </td>
        </tr>
        </tbody>
    </table>
</template>