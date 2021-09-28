<script>
import Card from "./components/Card.vue";
import CardUser from "./components/CardUser.vue";
const moment = require('moment') 

export default {
  name: "main-vue",
  props: {
    username: String,
    id: Number,
  },
  components: {
    Card,
    CardUser,
  },
  data() {
    return {
      activities: [],
    }
  },
  methods: {
    resetActivities(){
      for(let activity in this.activities){
        this.activities[activity].hour = 0;
      }
    },
    //Get the time spent on activites for this session. Params: Week, Month or Year
    getTimeSpent(when){
      this.axios
        .get("http://127.0.0.1:8000/api/users/" + this.id + "/time_spents")
        .then((response) => {
          for(let activity of response.data['hydra:member']){
            let actualActivity = this.activities.find(el => {
              if(el.name == activity.Activity.name) return true;
            });

            //Library moment.js
            let dateTimeSpent = moment(activity.Date);
            const now = moment();

            if(when == "month"){
              if(dateTimeSpent.add(30, 'd') > now){
                actualActivity.hour += activity.Hour;
              }
            }else if(when == "year"){
              if(dateTimeSpent.add(365, 'd') > now){
                actualActivity.hour += activity.Hour;
              }
            }else{
              if(dateTimeSpent.add(7, 'd') > now){
                actualActivity.hour += activity.Hour;
              }
            }
          }
        });
    },
    //Get all activities
    getActivities(when){
      this.axios
        .get("http://127.1.0.0:8000/api/activities")
        .then((response) => {
          for(let activity of response.data['hydra:member']){
            this.activities.push({name: activity.name, hour: 0});
          }
          this.getTimeSpent(when);
        });
    },
    changePeriod(when){
      this.resetActivities();
      this.getActivities(when);
    },
  },
  beforeMount() {
    this.getActivities();
  },
};
</script>

<template>
  <div>
    <card-user @week="changePeriod('week')" @month="changePeriod('month')" @year="changePeriod('year')" :username="username"></card-user>
    <div :v-if="activities">
      <div v-for="activity in activities" :key="activity">
        <card :activity="activity.name" :hour="activity.hour" />
      </div>
    </div>
  </div>
</template>

<style scoped></style>
