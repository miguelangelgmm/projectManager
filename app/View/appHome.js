import { NotesApp } from "./notesApp.js";
import { CalendarApp } from "./calendarApp.js";
import { CreateProjectApp } from "./createProjectApp.js";
import {NotificationsApp} from "./notificationApp.js";
import { SettingsApp } from "./settingsApp.js";
document.addEventListener("DOMContentLoaded", function () {

    const appNote = new NotesApp();
    appNote.init();

    const calendarApp = new CalendarApp();
    calendarApp.init();
    const createProjectApp = new CreateProjectApp();
    createProjectApp.init();
    const createNoficationApp = new NotificationsApp();
    createNoficationApp.init();
    const settingsApp = new SettingsApp();
    settingsApp.init();
})

