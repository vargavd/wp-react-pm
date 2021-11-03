// react imports
import React from "react";
import ReactDOM from "react-dom";

// prime styles
import '../node_modules/primereact/resources/primereact.min.css';
import '../node_modules/primereact/resources/themes/bootstrap4-dark-blue/theme.css';
import '../node_modules/primeicons/primeicons.css';
import '../node_modules/primeflex/primeflex.css';

// main styles
import "./styles.scss";

// main component
import App from "./components/App.js";


ReactDOM.render(<App />, document.getElementById("wpr-root"));
