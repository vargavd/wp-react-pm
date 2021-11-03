import React from "react";

import { Menu } from 'primereact/menu';

const Sidebar = () => {
  return (
    <div className="wpr-sidebar surface-section flex flex-column p-3">


      <Menu
        className="border-noround mt-2"
        model={[
          { label: "Projects", icon: "pi pi-id-card" },
          { label: "Task", icon: "pi pi-list" }
        ]}
      />

    </div>
  );
};

export default Sidebar;
