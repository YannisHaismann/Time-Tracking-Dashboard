<script>
export default {
  name: "card-user",
  props:{
    username: String,
  }
};
</script>

<template>
  <div>
    <div>
      <p>Request for <span>{{ username }}</span></p>
    </div>
    <div>
      <p v-on:click="this.$emit('week')">Week</p>
      <p v-on:click="this.$emit('month')">Month</p>
      <p v-on:click="this.$emit('year')">Year</p>
    </div>
  </div>
</template>

<style scoped></style>
