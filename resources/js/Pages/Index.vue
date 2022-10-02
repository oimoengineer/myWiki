<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue'
  import {useForm} from '@inertiajs/inertia-vue3'

  const {notes} = defineProps({
    notes: Array
  })
  
  const form = useForm({
    word: '',
    description: '',
  })
</script>
<template>
  <Authenticated>
    <div>
      <h1>MyWiki</h1>
    </div>
    <form @submit.prevent="form.post(route('note.store'))">
      <label>word</label>
      <input type="text" id="word" v-model="form.word" class="w-full">
      <div v-if="form.errors.word" class="text-red-700">{{ form.errors.word }}</div>
      <label>description</label>
      <textarea type="text" id="description" v-model="form.description" class="w-full"></textarea>
      <div v-if="form.errors.description" class="text-red-700">{{ form.errors.description }}</div>
      <button class="border-2 border-grey-200 bg-cyan-300 px-2" type="submit" :disabled="form.processing">create</button>
    </form>
    <div>
      <br>
      <h1>List</h1>
      <div v-for="note in notes">
        <div>
          <h3>{{ note.word }}</h3>
          <p>{{ note.description }}</p>
        </div>
      </div>
    </div>
  </Authenticated>
</template>