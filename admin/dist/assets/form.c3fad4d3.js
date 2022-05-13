var B=Object.defineProperty,R=Object.defineProperties;var g=Object.getOwnPropertyDescriptors;var w=Object.getOwnPropertySymbols;var A=Object.prototype.hasOwnProperty,$=Object.prototype.propertyIsEnumerable;var b=(a,e,s)=>e in a?B(a,e,{enumerable:!0,configurable:!0,writable:!0,value:s}):a[e]=s,V=(a,e)=>{for(var s in e||(e={}))A.call(e,s)&&b(a,s,e[s]);if(w)for(var s of w(e))$.call(e,s)&&b(a,s,e[s]);return a},D=(a,e)=>R(a,g(e));import{G as F,B as j,d as E,u as I,r as N,o as P,H as G,t as H,e as n,f,g as y,k as o,w as r,F as L,A as M,l as S,q as T}from"./vendor.7b1bb722.js";import{_ as z,a as C}from"./index.918d62b3.js";const J={name:"UserForm",setup(){const{proxy:a}=F();console.log("proxy",a);const e=j(null),s=E(),p=I(),{id:c}=s.query,d=N({id:c,userClasses:[],formData:{username:"",email:"",password:"",password_confirmation:"",id:"",class:""},rules:{username:[{required:"true"}],email:[{required:"true",type:"email"}],password:[{required:"true",min:6,max:40}],password_confirmation:[{required:"true",min:6,max:40}]}});P(async()=>{await t()}),G(()=>{});const m=()=>{e.value.validate(async u=>{if(u){let i=d.formData;await C.storeUser(i),await p.push({name:"user"})}})},t=async()=>{let u=await C.listClass();d.userClasses=u.data};return D(V({},H(d)),{formRef:e,submitAdd:m})}},K=S("Submit");function O(a,e,s,p,c,d){const m=n("el-input"),t=n("el-form-item"),u=n("el-option"),i=n("el-select"),U=n("el-button"),v=n("el-form"),k=n("el-col"),q=n("el-row");return f(),y("div",null,[o(q,null,{default:r(()=>[o(k,{span:12},{default:r(()=>[o(v,{model:a.formData,rules:a.rules,ref:"formRef","label-width":"200px",class:"formData"},{default:r(()=>[o(t,{label:"Username",prop:"username"},{default:r(()=>[o(m,{modelValue:a.formData.username,"onUpdate:modelValue":e[0]||(e[0]=l=>a.formData.username=l),placeholder:""},null,8,["modelValue"])]),_:1}),o(t,{label:"Email",prop:"email"},{default:r(()=>[o(m,{modelValue:a.formData.email,"onUpdate:modelValue":e[1]||(e[1]=l=>a.formData.email=l),placeholder:""},null,8,["modelValue"])]),_:1}),o(t,{label:"Password",prop:"password"},{default:r(()=>[o(m,{type:"password",modelValue:a.formData.password,"onUpdate:modelValue":e[2]||(e[2]=l=>a.formData.password=l),placeholder:""},null,8,["modelValue"])]),_:1}),o(t,{label:"Password Confirmation",prop:"password_confirmation"},{default:r(()=>[o(m,{type:"password",modelValue:a.formData.password_confirmation,"onUpdate:modelValue":e[3]||(e[3]=l=>a.formData.password_confirmation=l),placeholder:""},null,8,["modelValue"])]),_:1}),o(t,{label:"UID",prop:"id"},{default:r(()=>[o(m,{modelValue:a.formData.id,"onUpdate:modelValue":e[4]||(e[4]=l=>a.formData.id=l),type:"number",placeholder:""},null,8,["modelValue"])]),_:1}),o(t,{label:"Class",prop:"class"},{default:r(()=>[o(i,{modelValue:a.formData.class,"onUpdate:modelValue":e[5]||(e[5]=l=>a.formData.class=l),filterable:"",clearable:""},{default:r(()=>[(f(!0),y(L,null,M(a.userClasses,(l,_)=>(f(),T(u,{key:_,label:l,value:_},null,8,["label","value"]))),128))]),_:1},8,["modelValue"])]),_:1}),o(t,null,{default:r(()=>[o(U,{type:"primary",onClick:e[6]||(e[6]=l=>p.submitAdd())},{default:r(()=>[K]),_:1})]),_:1})]),_:1},8,["model","rules"])]),_:1})]),_:1})])}var Y=z(J,[["render",O]]);export{Y as default};