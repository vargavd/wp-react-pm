// react imports
import React from "react";
import { Redirect } from "react-router";
import { HashRouter as Router, Route, Switch } from "react-router-dom";

// prime components
import { Sidebar } from 'primereact/sidebar'
import { Menu } from 'primereact/menu';
import { Button } from 'primereact/button';
import { Avatar } from 'primereact/avatar';

// pages
import Home from "./Home/Home";

const App = () => {
  return (
    <>
      <Sidebar
        visible={true}
        dismissable={false}
        showCloseIcon={false}
        closeOnEscape={false}
        appendTo={document.getElementById("wpr-root")}
      >
        <div>
          <div className="wpr-logo">
            <i className="pi pi-globe"></i>
            WP React PM
          </div>

          <Menu
            className="border-noround mt-2"
            model={[
              { label: "Projects", icon: "pi pi-id-card" },
              { label: "Task", icon: "pi pi-list" },
              { label: "Users", icon: "pi pi-user" }
            ]}
          />
        </div>

        <div>
          <button className="logout">
            <Avatar label="P" />
            <Avatar image="user.png" />
            Profile
          </button>
          <Button label="Logout" icon="pi pi-sign-out" />
        </div>
      </Sidebar>
      <Router>
        <Switch>
          <Route exact path='/home' component={Home} />
          <Route path='*'>
            <Redirect to='/home' />
          </Route>
        </Switch>
      </Router>
    </>
  );
};

export default App;
