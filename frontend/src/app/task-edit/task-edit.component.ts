import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { TaskService } from '../_service/task.service';

@Component({
  selector: 'app-task-edit',
  templateUrl: './task-edit.component.html',
  styleUrls: ['./task-edit.component.css']
})
export class TaskEditComponent implements OnInit {

  angForm: FormGroup;
  task: any = {};

  constructor(private route: ActivatedRoute, private router: Router, private ts: TaskService, private fb: FormBuilder) {
    this.createForm();
  }

  createForm() {
    this.angForm = this.fb.group({
      TaskName: ['', Validators.required ],
      TaskDescription: ['', Validators.required ],
      TaskTime: ['', Validators.required ]
    });
  }

  updateTask(TaskName, TaskDescription, TaskPrice, id) {
    this.route.params.subscribe(params => {
     this.ts.upTask(TaskName, TaskDescription, TaskPrice, params.id);
     this.router.navigate(['products']);
   });
  }

  ngOnInit() {
    this.route.params.subscribe(params => {
        this.ts.getTask(params['id'])
        .subscribe(res => {
          this.task = res;
        });
    });
  }

}
