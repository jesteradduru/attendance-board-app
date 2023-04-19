<template>
  <div class="flex items-center justify-center text-md font-bold text-gray-500">
    🕧 {{ currentTime }} | {{ currentDate }}
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      currentTime: new Date().toLocaleTimeString(),
      currentDate: new Date().toLocaleDateString('en-US', {
        weekday: 'short',
        month: 'long',
        day: 'numeric',
      }),
    }
  },
  mounted() {
    setInterval(() => {
      this.currentTime = new Date().toLocaleTimeString()
      this.currentDate = new Date().toLocaleDateString('en-US', {
        weekday: 'short',
        month: 'long',
        day: 'numeric',
      })
    }, 1000)
  },
}
</script>
  
  <style>
  /* Center the clock horizontally and vertically */
  :host {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
  }
  
  /* Style the text color and font */
  div {
    color: #333;
    font-family: Arial, sans-serif;
  }
  </style>