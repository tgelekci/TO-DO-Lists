import React, {Component} from 'react';

class Todotasks extends Component{
    

    
    render(){
        const items1= this.props.todoList.map((taskObj, i) =>{
            return <li key={taskObj.taskno}><span>{taskObj.task}</span><span>&emsp;&emsp;</span><span>{taskObj.date}</span><span>&emsp;&emsp;</span><button className="w3-red" onClick={() => this.props.removeTask(taskObj.taskno)}>X</button></li>       
        });

        console.log(this.props.todoList, items1);
        return(
            <div className="w3-container w3-purple">
            <div className="w3-container w3-purple ">
            <br/>
            <div className="w3-container w3-center">
                <ul className="w3-ul w3-card-4 w3-blue w3-large">
                    {items1}
                </ul>
                </div>
            </div>
            <br/>
            </div>
        );
    }


}

export default Todotasks;