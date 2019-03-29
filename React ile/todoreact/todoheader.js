import React, {Component} from 'react';
import './headerstyle.css';

class Todoheader extends Component{

    render(){
        return(
            <div className="w3-container w3-orange">
                <h1 className="w3-jumbo w3-tangerine w3-animate-zoom"><i className="fa fa-star w3-spin"></i>   TO-DO LIST</h1>
            </div>
        );
    }
}

export default Todoheader;