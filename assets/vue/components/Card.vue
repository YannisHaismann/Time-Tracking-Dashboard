<script>
import ModalHours from './ModalHours.vue';

export default {
  name: "card",
  components:{
    ModalHours,
  },
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
    <modal-hours></modal-hours>
  </div>
</template>

<style scoped></style>
