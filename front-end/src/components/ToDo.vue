<script>
import axios from "axios";
export default {
  name: "ToDo",
  data() {
    return {
      tasks: [],
      NewTask: "",
      priority: "",
      date: "",
    };
  },
  methods: {
    PushTask() {
      const t = this;
      const params = {
        params: {
          task: t.NewTask,
          priorita: t.priority,
          data_scadenza: t.date,
        },
      };
      axios
        .get(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/ToggleTask.php",
          params
        )
        .then((res) => {
          console.log(res.data);
          t.tasks = res.data;
          t.NewTask = "";
          t.priority = "";
          t.date = "";
        })
        .catch((err) => console.log(err));
      console.log(t.priority);
    },
    deleteTask(index) {
      const t = this;
      const params = {
        params: {
          index: index,
        },
      };
      axios
        .get(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/DeleteTask.php",
          params
        )
        .then((res) => {
          t.tasks = res.data;
        })
        .catch((err) => console.log(err));
    },
    toggleTask(index) {
      const params = {
        index: index,
      };
      const config = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };

      axios
        .post(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/ToggleTask.php",
          params,
          config
        )
        .then((res) => {
          this.tasks = res.data;
        })
        .catch((err) => console.log(err));
    },
    mounted() {
      axios
        .get(
          "http://localhost/BOOLEAN/ESERCIZI/php-todo-list-json/back-end/ToDoApi.php"
        )
        .then((res) => {
          this.tasks = res.data;
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>

<template>
  <h1>TASKS: {{ tasks.length }}</h1>
  <form @submit.prevent="PushTask">
    <input type="text" name="task" v-model="NewTask" />
    <br />
    <input type="radio" name="priority" value="Bassa" v-model="priority" />
    <label for="Bassa">Bassa</label><br />
    <input type="radio" name="priority" value="Media" v-model="priority" />
    <label for="Media">Media</label><br />
    <input type="radio" name="priority" value="Alta" v-model="priority" />
    <label for="Alta">Alta</label>
    <br />
    <input type="date" value="2017-06-01" v-model="date" />
    <br />
    <input type="submit" value="SEND" />
  </form>

  <div v-for="(task, index) in tasks" :key="index">
    <div @click="toggleTask(index)">
      <del v-if="task.completed">
        <span>{{ task.task }}</span>
      </del>
      <span v-else>{{ task.task }}</span>
    </div>

    <ul>
      <li>
        {{ task.priorita }}
      </li>
      <li>
        {{ task.data_scadenza }}
      </li>
    </ul>
    <button @click="deleteTask(index)">DELETE</button>
  </div>
</template>

<style scoped>
li {
  list-style: none;
}
</style>
