import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TaskService {

  uri = 'http://localhost:8000/tasks';

  constructor(private http: HttpClient) { }

  addTask(TaskName, TaskDescription, TaskTime) {
    const obj = {
      TasktName,
      TaskDescription,
      TimePrice,
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
        .subscribe(res => console.log('Done'));
  }

  getTasks() {
    return this.http.get(`${this.uri}`);
  }

  getTask(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  upTask(TaskName, TaskDescription, TaskTime, id) {
    const obj = {
      TasktName,
      TaskDescription,
      TimePrice,
    };
    this.http.put(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  setDone(id) {
    const done = { id };
    return this.http.put(`${this.uri}/done/`, done);
  }

  deleteProduct(id) {
    return this.http.delete(`${this.uri}/delete/${id}`);
  }
}
