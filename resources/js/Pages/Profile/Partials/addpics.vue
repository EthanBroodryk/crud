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
     image:null
});

const submit = () => {


  form.post(route('storeImage'));

};



</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Add images</h2>

      
        </header>
   
        <form  @submit.prevent="submit" class="mt-6 space-y-6" enctype="multipart/form-data">
  

       

          <div class="mb-5">
            <label class="mb-5 block text-xl font-semibold text-[#07074D]">Add Images
            <input required type="file" @input="form.image = $event.target.files[0]"
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
