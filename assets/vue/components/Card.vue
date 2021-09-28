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
    <p>{{hour}}</p>
  </div>
</template>

<style scoped></style>
