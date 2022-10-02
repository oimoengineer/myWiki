<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue'
  import { Inertia } from '@inertiajs/inertia';
  import {useForm} from '@inertiajs/inertia-vue3'

  const {notes} = defineProps({
    notes: Array
  })
  
  const form = useForm({
    word: '',
    description: '',
  })

  const destroy = ({id}) => {
      Inertia.delete(route('note.destroy', {id: id}), {
      onBefore: () => confirm('delete?')
    })
  }
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
          <h2>{{ note.word }}</h2>
          <p>{{ note.description }}</p>
          <button class="px-3 bg-red-200 hover:bg-red-400 rounded-md" @click="destroy(note)">destroy</button>
        </div>
      </div>
    </div>
  </Authenticated>
</template>