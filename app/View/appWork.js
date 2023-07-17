import { taskApp } from "./taskApp.js";
import { SettingsApp } from "./settingsApp.js";

document.addEventListener("DOMContentLoaded", function () {

    const task = new taskApp();
    task.init();
    const settingsApp = new SettingsApp();
    settingsApp.init();

})

