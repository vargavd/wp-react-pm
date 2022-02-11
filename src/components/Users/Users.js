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
        role: user.roles[0]
      })));
    } else {
      usersDownloadFailed("User data is not an array!");
    }
  };

  // templates
  const userTemplate = user => (
    <div className="user" style={{ width: '100%' }}>
      <Avatar image={user.image} size="xlarge" shape="circle" />
      <div className="user--content">
        <h2>{user.name}</h2>
        <p>{user.role}</p>
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
    <div className="wpr-page users">
      <DataView
        value={users}
        itemTemplate={userTemplate}
        layout={"list"}
      ></DataView>
    </div>
  );
};

export default Users;