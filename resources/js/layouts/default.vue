<template>
  <div class="main-layout">
    <navbar />

    <main class="bg-blue-300">
      <child />
    </main>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  }
}
</script>
