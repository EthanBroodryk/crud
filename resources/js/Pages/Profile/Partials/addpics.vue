<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    profile_pic:null,
    name:null,
    email:null,
    user_id:user.id
});

const submit = () => {

console.log('test');
  form.post(route('profile.update'));

};



</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>
   
        <form  @submit.prevent="submit" class="mt-6 space-y-6">
        
        <div class="relative z-0 w-full mb-5 group">
                <input v-model="form.name" type="text" name="userEmail" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" :placeholder="user.name"/>
              
                <!-- <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Update Name</label> -->
          </div>

          <div class="relative z-0 w-full mb-5 group">
                <input v-model="form.email" type="email" name="userEmail" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" :placeholder="user.email"/>
                <!-- <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Update Email</label> -->
          </div>


          <div class="mb-5">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">Update Profile Image
            <input required type="file" @input="form.profile_pic = $event.target.files[0]"
            class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D] w-full"
            />
            </label>
          </div>

          <button type="submit" class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none bg-cyan-500">
            Save
            </button>

    
        </form>
    </section>
</template>
