import { Component, OnInit } from '@angular/core';
import { TaskService } from '../_service/task.service';

@Component({
  selector: 'app-task-add',
  templateUrl: './task-add.component.html',
  styleUrls: ['./task-add.component.css']
})
export class TaskAddComponent implements OnInit {

  angForm: FormGroup;
 constructor(private fb: FormBuilder, private ts: TaskService) {
   this.createForm();
 }

 createForm() {
   this.angForm = this.fb.group({
     TaskName: ['', Validators.required ],
     TaskDescription: ['', Validators.required ],
     TaskTime: ['', Validators.required ]
   });
 }

 addTask(TaskName, TaskDescription, TaskTime) {
     this.ts.addTask(TaskName, TaskDescription, TaskTime);
 }

 ngOnInit() {
 }

}
