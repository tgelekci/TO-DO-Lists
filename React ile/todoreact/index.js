import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import registerServiceWorker from './registerServiceWorker';

const taskObject = [
    
];

ReactDOM.render(<App todo={taskObject} />, document.getElementById('root'));
registerServiceWorker();
