// react imports
import React, { useState, useEffect } from "react";

// prime react imports
import { Button } from "primereact/button";
import { DataView } from "primereact/dataview";
import { Avatar } from "primereact/avatar";

// styles
import "./Users.scss"

const Users = (props) => {
  // states
  const [users, setUsers] = useState([]);

  // helper funcs
  const usersDownloadFailed = error => {
    throw new Error('An error occured during users downloading: ', error);
  };
  const usersDownloaded = userData => {
    console.log(userData);

    if (Array.isArray(userData)) {
      setUsers(userData.map(user => ({
        id: user.id,
        image: user.acf.thumbnail.sizes['user-thumbnail'],
        name: user.name,
        role: user.roles[0],
        email: user.email
      })));
    } else {
      usersDownloadFailed("User data is not an array!");
    }
  };

  // templates
  const userTemplate = user => (
    <div className="user col-4 border-3 border-0 py-3 surface-card">
      <Avatar image={user.image} size="xlarge" shape="circle" />
      <div className="user--content">
        <h2 className="text-primary m-0">
          {user.name}
        </h2>

        <p className="email opacity-60 text-xs -mt-1 mb-1">
          {user.email}
        </p>

        <p className="m-0">
          {user.role}
        </p>

        <div className="todos opacity-60 mt-2 font-medium flex align-items-center">
          <i className="pi pi-check-square mr-2"></i>

          <div className="">5/10</div>
        </div>
      </div>
    </div>
  );

  // run once only
  useEffect(() => {
    const fetchOptions = {
      headers: {
        'X-WP-Nonce': wpApiSettings.nonce
      }
    };

    fetch(`${wpApiSettings.root}wp/v2/users?acf_format=standard&context=edit&per_page=100&roles=marketing,manager,tester,designer,developer`, fetchOptions)
      .then(res => res.json())
      .then(usersDownloaded)
      .catch(usersDownloadFailed);

  }, []);


  return (
    <div className="wpr-page users block pt-4 px-5">
      <h1 class="text-5xl m-0 mb-4 text-primary">Users</h1>

      <DataView
        value={users}
        itemTemplate={userTemplate}
        layout="list"
      ></DataView>
    </div>
  );
};

export default Users;