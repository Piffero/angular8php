import { Component, OnInit } from '@angular/core';
import { TaskService } from '../_service/task.service';
import { Task } from '../task.modal';


@Component({
  selector: 'app-task-get',
  templateUrl: './task-get.component.html',
  styleUrls: ['./task-get.component.css']
})
export class TaskGetComponent implements OnInit {

  task: Task[];
  constructor(private ts: TaskService) { }

  deleteTask(id) {
      this.ts.deleteTask(id).subscribe(res => {
        this.task.splice(id, 1);
      });
  }

  doneTask(id) {
      this.ts.setDone(id).subscribe(res => {
        this.task.splice(id, 1);
      });
  }

  ngOnInit() {
    this.ts.getTasks()
    .subscribe((data: Task[]) => {
        this.task = data;
    });
  }

}
