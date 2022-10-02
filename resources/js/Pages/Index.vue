<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue'

  const {notes} = defineProps({
    notes: Array
  })
</script>
<template>
  <Authenticated>
    <div>
      <h1>MyWiki</h1>
    </div>
    <form action="/" method="POST">
      <label>word</label><br>
      <input type="text" name="note[word]"><br>
      <label>description</label><br>
      <textarea type="text" name="note[description]"></textarea><br>
      <button>create</button>
    </form>
    <div>
      <h1>List</h1>
      <div>
        <div v-for="note in notes">
          <h3>{{ note.word }}</h3>
          <p>{{ note.description }}</p>
        </div>
      </div>
    </div>
  </Authenticated>
</template>