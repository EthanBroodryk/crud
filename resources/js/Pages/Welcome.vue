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

        riskProfiles:[]
        
    },

    data(){

        return {

            addRiskOnwer:false,
            
         
        }

    },

    setup(){

    },

    computed:{



    },

    mounted(){
    
       

    },

    methods:{

        toggleAddRiskOwner(){
            if(this.addRiskOnwer == false){
                this.addRiskOnwer = true
               
            }else{
                this.addRiskOnwer = false
         
            }
     
        },
    } 

}

</script>

<template>

    <div class="flex h-screen">
               <!-- Side Nav -->
        <SideNav></SideNav>
               <!-- Main Content -->
        <div class="flex  flex-col justify-center w-full ">
               <!-- Top Nav -->
            <TopNav></TopNav>
               <!-- Main content -->
            <div class="flex flex-row px-5 mb-40">
                <div class="grid grid-cols-4 gap-4"> 
                    <div  v-if="!addRiskOnwer" class="flex flex-row col-start-1">
                        <span class="bg-green-400 h-20 w-1"></span>
                        <span class="text-4xl font-bold text-gray">Risk</span>
                        <span class="text-4xl font-bold pl-1"> Owner</span>
                    </div>
                    <button v-if="!addRiskOnwer" @click="toggleAddRiskOwner" class="ml-10 flex-end bg-blue-500 h-10 w-40 text-white px-4 py-2 rounded col-end-7 items-center">Add Risk Owner</button>  
                </div>
            </div> 
            
            <!--crud table-->
            <div v-if="!addRiskOnwer" class="w-full px-5 mb-60">
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
                        <tr v-for="(risk,index) in  riskProfiles" class="bg-white">
                            <td class="px-4 py-2 border">{{ risk.name }}</td>
                            <td class="px-4 py-2 border">{{ risk.title }}</td>
                            <td class="px-4 py-2 border">{{ risk.email }}</td>
                            <td class="px-4 py-2 border">{{ risk.role }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex items-center">
                                    <Link class="mr-4" :href="route('riskProfileUpdate')" method="post" :data="{risk_id:risk.id}">
                                        <img src="/images/trashcan.png" alt="Trashcan icon" class="h-6 w-6">
                                    </Link>
                                    <button><img src="/images/pen.png" alt="Pen icon" class="h-6 w-6"></button>
                                    <button><img src="/images/eye.png" alt="Eye icon" class="h-6 w-6"></button>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr class="bg-white">
                            <td class="px-4 py-2 border">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td class="px-4 py-2 border">Malcolm Lockyer</td>
                            <td class="px-4 py-2 border">1961</td>
                            <td class="px-4 py-2 border">1961</td>
                            <td class="px-4 py-2 border">
                                <button><img src="/images/trashcan.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                                <button><img src="/images/pen.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                                <button><img src="/images/eye.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <!--crud table-->
            <!--Add Risk Owner popup-->

            <!-- <div v-if="addRiskOnwer" class="w-full p-5 mb-80">
                <table class="table-auto border-collapse w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-left">poes</th>
                            <th class="px-4 py-2 text-left">Title</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Role</th>
                            <th class="px-4 py-2 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="px-4 py-2 border">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td class="px-4 py-2 border">Malcolm Lockyer</td>
                            <td class="px-4 py-2 border">1961</td>
                            <td class="px-4 py-2 border">1961</td>
                            <td class="px-4 py-2 border">
                                <button><img src="/images/trashcan.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                                <button><img src="/images/pen.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                                <button><img src="/images/eye.png" alt="Bell icon" class="h-6 w-6 ml-4"></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

         <!--Add Risk Owner-->
            <div v-if="addRiskOnwer" class="mb-20 w-full p-5">
                <form @submit.prevent="submit" class="bg-white shadow-md rounded-lg p-5">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name" name="name" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input  v-model="form.title" type="text" id="title" name="title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input v-model="form.email" type="email" id="email" name="email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select v-model="form.role" id="role" name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
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

    








          
        

</template>

