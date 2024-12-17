<script>
import './style.css'
import "../bootstrap.js";
let areweOnTaskPage = window.location.pathname == '/tasks';

let taskTitle;
let taskText;
let saveTaskBtn;
let newTaskBtn;
let taskList;

if (areweOnTaskPage) {
  taskTitle = document.querySelector('.task-title');
  taskText = document.querySelector('.task-textarea');
  saveTaskBtn = document.querySelector('.save-task');
  newTaskBtn = document.querySelector('.new-task');
  taskList = document.querySelectorAll('.list-container .list-group');
}

// Show an element
const show = (elem) => {
  elem.style.display = 'inline';

};

// hide an element
const hide = (elem) => {
  elem.style.display = 'none';

};

// activeTask is used to keep track of the task in the textarea
let activeTask = {};

const getTasks = () =>

  fetch('/api/tasks.json', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then((respnse) => respnse.json())

    .then((data) => data)
    .catch((error) => {
      console.error('Error:', error);
    });

const saveTask = (task) =>
  fetch('/api/tasks', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },

    body: JSON.stringify(task),

  });



const updateTask = (task) =>
  fetch('/api/tasks', {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },

    body: JSON.stringify(task),

  });



const deleteTask = (id) =>
  fetch(`/api/tasks/${id}`, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
    },
  });


const renderActiveTask = () => {
  hide(saveTaskBtn);

  if (activeTask.id) {
    taskTitle.setAttribute('readonly', true);
    taskText.setAttribute('readonly', true);
    taskTitle.value = activeTask.title;
    taskText.value = activeTask.task;

  } else {
    taskTitle.removeAttribute('readonly');
    taskText.removeAttribute('readonly');
    taskTitle.value = '';
    taskText.value = '';
  }
};

const handleTaskSave = () => {

  const newTask = {
    title: taskTitle.value,
    task: taskText.value,

  };

  saveTask(newTask).then(() => {
    getAndRenderTasks();
    renderActiveTask();

  });

};

// Delete the clicked task
const handleTaskDelete = (e) => {
  // Prevents the click listener for the list from being called when the button inside of it is clicked
  e.stopPropagation();

  const task = e.target;
  const taskId = JSON.parse(task.parentElement.getAttribute('data-task')).id;

  if (activeTask.id === taskId) {
    activeTask = {};

  }

  deleteTask(taskId).then(() => {
    getAndRenderTasks();
    renderActiveTask();
  });
};

// Sets the activeTask and displays it
const handleTaskView = (e) => {
  e.preventDefault();
  activeTask = JSON.parse(e.target.parentElement.getAttribute('data-task'));
  renderActiveTask();

};

// Sets the activeTask to and empty object and allows the user to enter a new task
const handleNewTaskView = (e) => {
  activeTask = {};
  renderActiveTask();
};

const handleRenderSaveBtn = () => {
  if (!taskTitle.value.trim() || !taskText.value.trim()) {
    hide(saveTaskBtn);
  } else {
    show(saveTaskBtn);
  }
};

let taskListItems = [];
// Render the list of task titles
const renderTaskList = async (tasks) => {

  let jsonTasks = JSON.parse(await tasks);
  if (areweOnTaskPage) {

    taskListItems.forEach((el) => (taskList[0].removeChild(el)));
    taskListItems = [];

  }


  // Returns HTML element with or without a delete button
  const createLi = (task, delBtn = true) => {
    const liEl = document.createElement('li');
    liEl.classList.add('list-group-item');

    const spanEl = document.createElement('span');
    spanEl.classList.add('list-item-title');

    spanEl.innerText = task;

    spanEl.addEventListener('click', handleTaskView);

    liEl.append(spanEl);

    if (delBtn) {
      const delBtnEl = document.createElement('i');
      delBtnEl.classList.add(
        'fas',
        'fa-trash-alt',
        'float-right',
        'text-danger',
        'delete-task'
      );
      delBtnEl.addEventListener('click', handleTaskDelete);

      liEl.append(delBtnEl);

    }

    return liEl;
  };

  if (jsonTasks.length === 0) {
    taskListItems.push(createLi('No saved Tasks', false));
  }

  jsonTasks.forEach((task) => {
    const li = createLi(task.title);
    li.dataset.task = JSON.stringify(task);
    taskListItems.push(li);

  });

  if (areweOnTaskPage) {
    taskListItems.forEach((task) => taskList[0].append(task));
  }

};

// Gets tasks from the db and renders them to the sidebar
const getAndRenderTasks = () => getTasks().then(renderTaskList);

if (areweOnTaskPage) {
  saveTaskBtn.addEventListener('click', handleTaskSave);
  newTaskBtn.addEventListener('click', handleNewTaskView);
  taskTitle.addEventListener('keyup', handleRenderSaveBtn);
  taskText.addEventListener('keyup', handleRenderSaveBtn);

}

getAndRenderTasks();
</script>
<template>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Task Taker </a>
    <div class="icons">
      <i class="fas fa-save text-light save-task"></i>
      <i class="fas fa-plus text-light new-task"></i>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 list-container">
        <div class="card">
          <ul class="list-group"></ul>
        </div>
      </div>
      <div class="col-8">
        <div id="informDiv"></div>
        <input class="form-control task-title"  placeholder="Task Title" maxlength="28" type="text" />
        <textarea class="task-textarea" placeholder="Task Text"></textarea>
      </div>
    </div>
  </div>
</template>