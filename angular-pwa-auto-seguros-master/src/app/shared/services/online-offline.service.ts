import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';

declare const window: any;

@Injectable({
  providedIn: 'root'
})
export class OnlineOfflineService {

  private statusConexao$ = new Subject<boolean>();

  constructor() {
    window.addEventListener('online', () => this.atualizaStatusConexao());
    window.addEventListener('offline', () => this.atualizaStatusConexao());
  }

  get isOnline() : boolean {
    return !!window.navigator.onLine;
  }

  get statusConexao() {
    return this.statusConexao$.asObservable();
  }

  atualizaStatusConexao() {
    this.statusConexao$.next(this.isOnline);
  }

}
