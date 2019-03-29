import React, {Component} from 'react';

class Todoinput extends Component{

    constructor(){
        super();
        this.justSubmitted=this.justSubmitted.bind(this);
    }

    justSubmitted(event){
        event.preventDefault();
        const input= document.querySelector('input[type="text"]');
        const input2=document.querySelector('input[type="date"]');
        const value=input.value;
        const value2=input2.value;
        input.value='';
        input2.value='';
        const returnObj = {
            task: value,
            date: value2,
        };
        this.props.updateList(returnObj);
    }
        render(){
            return(
                <div className="w3-container w3-amber" >
                    <form className="w3-container" onSubmit={this.justSubmitted}>
                        <p className="w3-left w3-xlarge"> <i className="fa fa-tasks"></i>   <label>TASK:</label>   </p>
                        <p><input id="taskinput" className="w3-input" type="text"></input></p>
                
                       <p className="w3-left w3-xlarge"> <i className="fa fa-calendar"></i>   <label>DATE:</label>   </p>
                        <p><input id="dateinput" className="w3-input" type="date"></input></p>
            
                        <br/>
                        <p><button className="w3-btn w3-white w3-right w3-large" value="ADD">ADD</button></p>
                        <br/>
                        <br/>
                        <br/>



                    </form>
                    
                </div>
            );
        }
    }
    
    export default Todoinput;