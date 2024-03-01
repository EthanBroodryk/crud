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
        images:[],
        
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
    
        console.log(this.images)
       

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
            <img src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAflBMVEX///8AAAD4+Pj39/f7+/tDQ0NPT09LS0sFBQXx8fFeXl49PT1GRkYMDAxhYWHr6+vMzMzc3Nw3Nzd1dXVZWVnS0tLAwMBTU1MVFRVlZWWWlpadnZ2ysrKoqKiDg4MmJiYdHR2Li4vY2Nji4uJvb28jIyMwMDC8vLykpKRzc3NtK0c+AAAEnElEQVR4nO3caXeiMBQGYINsCtSlVNBpXWptZ/7/H5wgg4KyczEX531Ojx9sZ07ew5LkJjAaAQAAAAAAAAAAAAAAAAAAwGikbQzjl+pG9GkWCulVdTP6o+/E2Y/qhvRmI+xzwp2uuiU9mYjEsx7E90tCX3VTevJySSie8zTV9teEb6ob04vjNaD4UN2YXsxTCbeqG9OLj1TCL9WN6UXSG0ZM1Y3pw9FPHcPwqLo5hGTHMFsdXHEr9A+rmerGkTj+Nu/SXc5X62Oiun1dzV/SgXLY20FnfFsWR7vaDHaEM96WHr2r70/VTW3n+F0nXWyQY5y3+vnEIAc58+pUV/YASxuLmpfgJeHQjuKxMtS9g+pGN6EZjfPJw7hS3ewGtk1O0UtEeziDuEZ3mZTBlG+0ZYtDePauuuk1/Wp5CMVQKlSTlgcwslHd+Fo2bc9RyR7ERKNRX39rCAtT79UxSgxhSSNnRt8E/26/zXjtyh5AnbFDVxFTHaCS1TXhXHWCCrOuAdlPMVadE1qqI1Q4dE7ojVVnKNexr4gsVGco1z0g8x5x0mnIFuM9hVoQHEPe84sfgoS864of1QEqTVWHKLUhSMi7Q9wSJNxpqlOU+UOQ0GM9zw8IEgrOZVPdoUjIeTVR31e3vxrjQY0+qW5+DYyXS/VuJYwE53pb2wWLLM6Dmu7z32jkznmB5jdBQtnlq45RgmJII1iX29Y0CRkPatL784pmwvbtL+y7v+Zbx9BO6XZ61i704tZ/C08ms+WnWMrrLPoyXkX1vG9Pfutld4fx7fKzxdJwbbjm3rAMI/Bd07KCYGm6lu8II3CFGViWE7im/IUjP7LjWb5d/mc2obO23N1pOjWnrm+5ztIxpr5jGsJ0ZEIZeRq4S8uU+QMrW6Lju7UmW8OwPc+Wp23ohWHo7b1I9BnKU9MTYfRlRP7J3tuHmX+5Vh2kEE13KK9R1UEKvRIl5Fv2vt/M3RLb7oIqINvuovvKWoLr/Ilm7hThutRNUQ6OOaqjFKC6lfLdONR8U2khnuW2MV1ApiPTZpvzy/G81VCN2SKh6jC5vggT8qzs7ygTchzV0FSDExyniHT9fYRjn09UZ0sc2W001WkDMtxzMu++kSaD334FukHpP9yGpmOStdE0bqcpxapTFre7aeetwfd4zS8oR90JXqPvKfGd9IxTxY2uQpPGaC2YZhvNPT4vzDr0E5BPn0g75k5b8ojYX0DZKTKYCU9Ip/Y3bGErvha1T6LdFyWcd0Wn6mKz/QpICxeFPMP/s3n441BJzcImePyg1OV/f/TzUJSlw3o5Tw+e9FM8dtDMo0c4OsWO7kYUjFJ1LTau+tGSz3u6rmvnn38en4LGYBte3+s09pJYR3wGAxYiEy//0uJYum+naAsD94ea6yta0njyY2g/07t2x6e8iEwXCdspqDWqbhahvFdJ2Kyfq2gq/2b6PJfhKH/d5rneJTzOmUY+06uER3llf25rS53dRuS566mTSXqh3+W1sERlsY3fSntar553RjV7m8+PrJ9GBwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPhf/QXJHz0KvG8CWwAAAABJRU5ErkJggg==" alt="Bell icon" class="h-6 w-6">
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
                                    <img src=" data:image/png;base64,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" alt="Trashcan icon" class="h-6 w-6">
                                </Link>
                                <button v-if="isDisabled !== index" @click="disable(index)" class="px-2"><img src=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAeFBMVEX///8VfvsAefsAd/u41P4AdfsAevvy+P8OfPv7/v9Fk/w8j/z2+v+71v6qyv0AcvuDs/zU5f6Htvzb6f5TmftOlvuhxv0hhPvr9P8lh/uxz/14q/zN4v5JlPt6sPyszf2Pu/1ZnvtlpPzB2v7l8P8Abvqawf07jPsdzSxbAAAEnklEQVR4nO2de1PiMBTF24bWCgLWCshD1se6fv9vuKWFvkiaNMNOPNnz+8vR0bnHnJN7086EICCEEEIIIYQQQgghhBBCCCGEEELILbj/fNu/fxwXuetC/hH5uxAiSZNIxJv1vetqbs/LPk7S8EK82bku6NbkGxG2SeNH1yXdls8oDXuId9dF3ZJJ3Nd3krjyJ4wTcbWClUTXhd2KeSwVWEh8dl3abZjLV7CS6INRJ0KlzxOJgwJ9yKIyg75kcaITiG5URZvoSdy7LtOe+XAGL8Rr14XaYigwTMWL61LtyJcGFi2Jjq5rtWQhm0alixiCLmKwWBpKjCeuS7VloW8WJQnudrowaReFTaeuCx1LVn9laNQtWNefL5/qr40kpuGDw3LHU5zoW09hjLK4hVJYjmodifo1hMrh+cAbjzFq8uGw4LHUJ/q2RJ1RY6Cnp63TRNuow00jTXFmms5xyTiLEU7D753oDbOYit8Oax7F1YHXrGnEb+5KHofkoZOJUXEe70sPvHqjRlOUbq840eskRrM7h0WPQflUbTiL0Qxl5h54qjaURSCLDk0taqNGUxSLDrx86Uts/yuiGcoKat5NqAY4pAxqBPZWEc+iJkfc6yx60CbURj39BpJFDZ9sd5sGUJswfDfRM+oXTgbNBXYk7lAEGmZQYlQQjDOIKtGoTfQkPun/7M9BM6rhr6LBJCPj64/rwk2xFBhNUR4cWmSwFOjbqHYt0LtRrSfQx1GtKxDFolZtAupEzwzKBeJY1HIFcQR6n0HbXRRF4H/QJuwEclT7Kfg/qrFNyAUCtQnvM2ijD8miPNErBOJY1Pc24X0GOaopBHqfQZQV5KimEAg0qtnog8qgnUAci3JUUwjEsShHNblAFItaj2ooK8gMKgTiWJSjmlwgTgZ9f/ni/6jGE71CoPdtAiWDtrsoUAa9bxPMoFQgjkV5olcIhLGo7bCNsskEh9RGIU4GC7LrS2K1JDAZLMlHS8TJ4JksHCcRyqIV2ags4gicNNf7ZIm5RJxRLfiOV3WtufEqAmXwJUzFcy3RNIs4Fi00xUW9zU23ZkbFGdUK1qJcktpzuYFEIIsW7JOy5iaL+h0VaFQ7Mav0tC7z1WURKYMFD6Kuu/7ecBaB2kTJob5OJXptmsbAAIeVweC80ZxrN2kaYBYNLhtNRevTGFTbDZ7AYNutX9M00DJY8NC91SgaHuDA2kTJoXdv02AWAS16uvCnr+K1/ln/1A81qtV8JGFfoiqLcG2i4lsSNrlRETMYlEenK4WdAa7ebiAzWJBJX4dKBjjANlGxlr/wbQ9wpUTQDAbdiWYgi6gWLZiqxs/OACcg20SJdKO5ZLGRiJrB4Hqi6Uhc4epqUGw0Z6M+eyBRtdGcV/FV/xd+OpKJRpFFUO51N/pHK9hNtGJoownTNBJL3DZRcXV0qtVFQiSzxx38h9pKNprTR9mKzetxl+l/HYBt2l+5eLM67nKU68a03DVPYk7i4unjr9yDFtjiUMYwSUQUTo/4mZOwjs+2zPxauYb9yZbg7WAY9IGFEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghhBjwF2/bPLtQINGnAAAAAElFTkSuQmCC" alt="Pen icon" class="h-6 w-6"></button>
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
                        <Link v-if="isDisabled !== index" class="mr-4" :href="route('riskProfileDelete')" method="post" :data="{risk_id:risk.id}">
                                    <img src=" data:image/png;base64,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" alt="Trashcan icon" class="h-6 w-6">
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

