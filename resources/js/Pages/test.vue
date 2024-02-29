<script setup>
import { useForm,usePage,Link } from '@inertiajs/vue3';

    const form = useForm({

        name:null,
        title:null,
        email:null,
        role:null,
    
    })

    const submit = () => {

        form.post(route('addRiskOwner'));

    };

</script>

<script>
import Navbar  from '@/Components/Navbar.vue';
import SideNav from '@/Components/SideNav.vue';
import TopNav from '@/Components/TopNav.vue';


export default {



    components: {
        Navbar,
        SideNav,
        TopNav,
    },

    props:{

        riskProfiles:[],
        profile_image:String,
        
    },

    data(){

        return {

            addRiskOnwer:false,
            isDisabled:-1,
            searchQuery: '',
            bell_icon:'/images/images.png',
            crudTitles:[
                'Name',
                'Title',
                'Email',
                'Role',

            ]
         
        }

    },

    setup(){

    },

    computed:{

        filteredProducts() {

            

                if(this.riskProfiles.length > 0){

                    return this.riskProfiles.filter(riskProfiles =>
                    riskProfiles.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                );

            }
            
      

    },

        isSaveDisabled() {
            return this.filteredProducts.email == '' || this.filteredProducts.name == '';
            }
        },



    

    mounted(){
    
        console.log(this.profile_image)
       

    },

    methods:{

        toggleAddRiskOwner(){
            if(this.addRiskOnwer == false){
                this.addRiskOnwer = true
               
            }else{
                this.addRiskOnwer = false
         
            }
     
        },

        disable(index){
            
            this.isDisabled = index
            console.log('index::', index)

        },

        cancel(index){
            this.isDisabled = -10
        }
    } 

}

</script>

<template>

<div class="flex h-screen">

<!-- Side Nav Large Screen-->
     <SideNav></SideNav>

<!-- Main Content Container -->
    <div class="flex flex-col w-full ">
        <!-- Top Nav -->
    <div class="bg-white text-white flex justify-between  items-center px-4  border-b top-0">
    <!-- Search input -->
        <input @input="showFiltered" type="text"  placeholder="Search Name" v-model="searchQuery" class="block h-10 w-40 text-gray-600 border border-gray-200 rounded-full focus:outline-none focus:border-black" />
        <!-- Logout button and bell icon -->

        <div class="flex justify-between items-center">
            <Link :href="route('logout')" method="post" as="button" class="p-4 text-gray-600">Logout</Link>
            <img :src="bell_icon" alt="Bell icon" class="h-6 w-6">
            <Link :href="route('profile.edit')" method="get" as="button" class="p-4 text-gray-600"><img :src="profile_image" alt="Bell icon" class="h-6 w-6 rounded-full"></Link>
        </div>
    </div>


        <!-- Main Content -->
        <div class="flex-grow bg-gray-50">
        <!-- Main Content Content -->
            <div class="flex flex-col sm:flex-row justify-between px-10 mt-5">
                <div class="flex flex-row sm:col-start-1 items-center">
                    <span class="bg-green-400 h-10 sm:h-20 w-1 sm:w-1"></span> <!-- Adjusted height to sm:h-20 and width to sm:w-4 -->
                    <span class="text-2xl sm:text-4xl font-bold text-gray-600">Risk Owner</span>
                </div>
                <button @click="toggleAddRiskOwner" class="mt-5 sm:mt-0 ml-0 sm:ml-10 bg-blue-500 h-10 w-full sm:w-40 text-white px-4 py-2 rounded items-center">Add Risk Owner</button> 
            </div>

           <!--Crud Large Screen-->
            <div v-if="!addRiskOnwer" class="w-full px-10 mt-10 hidden lg:block">
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
                    <tr v-for="(risk,index) in    filteredProducts" class="bg-white">
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
                                <Link @click="closeModal()" v-if="isDisabled == index && risk.name !== '' && risk.title !== '' && risk.email !== ''" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" :href="route('riskProfileUpdate')" method="post" :data="{risk_id:risk.id,name:risk.name,title:risk.title,role:risk.role,email:risk.email}">Save</Link>

                                <button @click="cancel(index)" v-if="isDisabled == index && risk.name !== '' && risk.title !== '' && risk.email !== ''" class="px-4 ml-10 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>

                            </div>
                        </td>
                     </tr>
                    </tbody>
                </table>
            </div>
            <!--Crud Large Screen-->

            <!--Crud  Small Screen-->
            <div v-if="!addRiskOnwer" class="flex flex-col lg:hidden">
                <div  v-for="(risk,index) in    filteredProducts" class="flex flex-col sm:flex-row border-b my-6">
                    <div  class="w-full sm:w-1/3 p-4 bg-gray-100">NAME</div>
                    <input type="text" v-model="risk.name" class="w-full sm:w-1/3 p-4 bg-white" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index" required>
                    <div  class="w-full sm:w-1/3 p-4 bg-gray-100">TITLE</div>
                    <input type="text" v-model="risk.title" class="w-full sm:w-1/3 p-4 bg-white" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index" required>
                    <div  class="w-full sm:w-1/3 p-4 bg-gray-100">ROLE</div>
                    <!-- <input type="text" v-model="risk.role" class="w-full sm:w-1/3 p-4 bg-white" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index" required> -->
                    <select v-model="risk.role" id="role" name="role" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index" required>
                            <option value="owner">Owner</option>
                            <option value="client">Client</option>
                        </select>
                    <div  class="w-full sm:w-1/3 p-4 bg-gray-100">EMAIL</div>
                    <input type="text" v-model="risk.email" class="w-full sm:w-1/3 p-4 bg-white" :class="{ 'border-none': isDisabled !== index }" :style="{ 'border': isDisabled !== index ? 'none' : '1px solid blue' }" :disabled="isDisabled !== index" required>

                    <div class="flex justify-between items-center bg-gray-100">
                        <Link v-if="isDisabled !== index" class="p-2" :href="route('riskProfileDelete')" method="post" :data="{risk_id:risk.id}">
                            <img src="/images/trashcan.png" alt="Trashcan icon" class="h-6 w-6">
                        </Link>
                        <button class="p-2" v-if="isDisabled !== index" @click="disable(index)" ><img src="/images/pen.png" alt="Pen icon" class="h-6 w-6"></button>
                        <button class="p-2" v-if="isDisabled !== index" ><img src="/images/eye.png" alt="Eye icon" class="h-6 w-6"></button>
                        <!-- <button v-if="isDisabled == index" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Save</button> -->
                        <Link @click="closeModal()" v-if="isDisabled == index" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600" :href="route('riskProfileUpdate')" method="post"  :data="{risk_id:risk.id,name:risk.name,title:risk.title,role:risk.role,email:risk.email}" :disabled="risk.name ==''">Save</Link>
                        <button @click="cancel(index)" v-if="isDisabled == index" class="px-4 ml-10 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                    </div>

                </div>
              
                <!-- Add more rows as needed -->
            </div>
            


            <!--Crud  Small Screen-->



            <!--Add Risk Owner-->
            <div v-if="addRiskOnwer" class="mb-20 w-full p-5">
                <form @submit.prevent="submit" class="bg-white shadow-md rounded-lg p-5">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name" name="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input  v-model="form.title" type="text" id="title" name="title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input v-model="form.email" type="email" id="email" name="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select v-model="form.role" id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>
                            <option value="owner">Owner</option>
                            <option value="client">Client</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add
                        </button>
                    </div>
                </form>
            </div>
        <!--Add Risk Owner Form-->
        </div>

    </div>

</div>








          
        

</template>

