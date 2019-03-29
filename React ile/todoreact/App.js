import React, { Component } from 'react';
import './App.css';
import Todoheader from './todoheader.js';
import Todoinput from './todoinput.js';
import Todotasks from './todotasks.js';
import Todofooter from './todofooter.js';

class App extends Component {
  constructor(props){
    super(props);
    this.state = {
      todoList: props.todo 
    };

    this.updateList=this.updateList.bind(this);
    this.removeTask=this.removeTask.bind(this);
  }
  
  
  componentDidMount(){
   

    fetch("http://localhost/dbreact.php?action=select", {
      method: 'GET',
    })
    .then(response=>response.json())
    .then(json=>{
      this.setState({
        todoList: json.content.message
    
      });
    
    })
}


  updateList(todoObj){
    
    const todoList = this.state.todoList;
    //const idx=todoList.length-1;   //todoList içindeki tasknonun maxının bul 1 ustunu al ordan baslat
    //todoObj.taskno = parseInt(idx, 10) + 2;
    //const idt=(Math.max.apply(Math, todoList.map(function(o){return o.taskno;})));
    //todoObj.taskno = idt+1;
   // todoList.push(todoObj);
    
   /* this.setState({
      todoList: todoList
    });
*/
if(todoObj.task===""||todoObj.date===""){
  alert("Please fill in the task and date!");
}
    
else{
    fetch("http://localhost/dbreact.php?action=insert&task="+todoObj.task+"&date="+todoObj.date)
    .then(response=>response.json())
    .then(json=>{
      todoList.push(json.content.message);
      this.setState({
        todoList: todoList
      });
     
    })

    //console.log(todoObj.task);
    //console.log(todoObj.date);
  }
  }

  removeTask(taskno){
    const deletedList=this.state.todoList;
    //deletedList.splice(taskno, 1);

    fetch("http://localhost/dbreact.php?action=delete&taskno=" + taskno)
    .then(response=>response.json())
    .then(json=>{
      function deleteTasks(task){
        //if(taskno==task.taskno)
        return taskno===task.taskno;
      }
      deletedList.splice(deletedList.findIndex(deleteTasks), 1);
      this.setState({
        todoList: deletedList
      });
    })
//deletedList.taskno.indexof()
   // console.log(deletedList);
    //this.setState({todoList: deletedList});

  }
  
  render() {
    return (
      <div className="App">
        <Todoheader/>
        <Todoinput updateList={this.updateList} />
        <Todotasks todoList={this.state.todoList} removeTask={this.removeTask}/>
        <Todofooter/>
      </div>
    );
  }
}

export default App;
