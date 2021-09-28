<script>
export default {
  name: "card",
  props:{
    activity: String,
    hour: Number,
  }
};
</script>

<template>
  <div>
    <h1>{{activity}}</h1>
    <p><span>{{hour}}</span> hrs</p>
      <button></button>
  </div>
</template>

<style scoped></style>
