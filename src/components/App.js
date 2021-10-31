// react imports
import React from "react";
import { Redirect } from "react-router";
import { HashRouter as Router, Route, Switch } from "react-router-dom";

// pages
import Home from "./Home/Home";

const App = () => {
  return (
    <Router>
      <Switch>
        <Route exact path='/home' component={Home} />
        <Route path='*'>
          <Redirect to='/home' />
        </Route>
      </Switch>
    </Router>
  );
};

export default App;
