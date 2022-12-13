import Dropdown from '@/Components/Dropdown';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-react';
import { filter, get } from 'lodash';
import { useEffect, useState } from 'react';


export default function Invoices(props) {

    const [fieldData, setFieldData] = useState({id: props.invoice.inv_id > 0 ? props.invoice.inv_id : 0, _method: 'PUT'});

    const handleChange = (event) => {
        const fieldName = event.target.name;
        const fieldValue = event.target.value;
        setFieldData(values=>({...values, [fieldName]: fieldValue}));
    }

    const onSaveHandler = (event) =>{
        if(props.invoice.inv_id > 0){
            Inertia.post('/invoices', fieldData); 
        }else{
            Inertia.post(route('invoices.store'), fieldData); 
        }        
    }

    const onCancelHandler = ()=>{
        Inertia.get(route('invoices.index')); 
    }

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Invoices</h2>}
        >
            <Head title="Invoices" />

            <div className="pt-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">

                            <form className="mt-6 space-y-6">                              
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <InputLabel for="invoice_number" value="Invoice #"/>

                                        <TextInput id="invoice_number" className="mt-1 block w-full"
                                            name="inv_number"
                                            value={props.invoice.inv_number}
                                            handleChange={handleChange}
                                            requireds
                                            autofocus 
                                        />
                                    </div>
                                    <div>
                                        <InputLabel for="invoice_to" value="Invoice To"/>

                                        <TextInput id="invoice_to" className="mt-1 block w-full"
                                            name="inv_to"
                                            value={props.invoice.inv_to}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <InputLabel for="contact_number" value="Contact #"/>

                                        <TextInput id="contact_number" className="mt-1 block w-full"
                                            name="inv_contact_number"
                                            value={props.invoice.inv_contact_number}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>

                                    <div>
                                        <InputLabel for="invoice_date" value="Invoice Date"/>

                                        <TextInput id="invoice_date" className="mt-1 block w-full"
                                            type="date"
                                            name="inv_date"
                                            value={props.invoice.inv_date}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <InputLabel for="currency" value="Currency"/>

                                        <select id="currency" className="mt-1 block w-full" name="inv_currency" onChange={handleChange} 
                                            defaultValue={props.invoice.inv_currency}>
                                            <option value=''>-- Select Currency --</option>    
                                            {props.currencyList.map((item)=>
                                                <option value={item.cur_id}>{item.cur_code}</option>    
                                            )}
                                        </select>
                                        
                                    </div>

                                    <div>
                                        <InputLabel for="status" value="Status"/>

                                        <select id="status" className="mt-1 block w-full" name="inv_status" onChange={handleChange}>
                                            <option value=''>-- Select Status --</option>    
                                            {props.statusList.map((item)=>
                                                <option value={item.opt_id}>{item.opt_name}</option>    
                                            )}
                                        </select>
                                        
                                    </div>
                                    <div>
                                        <InputLabel for="payment_mehtod" value="Payment Method"/>

                                        <select id="payment_mehtod" className="mt-1 block w-full" name="inv_payment_method" onChange={handleChange}>
                                            <option value=''>-- Select Payment Method --</option>    
                                            {props.paymentMethodList.map((item)=>
                                                <option value={item.opt_id}>{item.opt_name}</option>    
                                            )}
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="grid">
                                    <InputLabel for="delivery_address" value="Delivery Address"/>

                                    <textarea id="delivery_address" name="inv_delivery_address" className="mt-1 block w-full" onChange={handleChange}>
                                        {props.invoice.inv_delivery_address}
                                    </textarea>
                                    
                                </div>

                            </form>

                            <div className="flex items-center gap-4 py-4">
                                <PrimaryButton type='button' onClick={onCancelHandler}>Cancel</PrimaryButton>
                                <PrimaryButton type='button' onClick={onSaveHandler}>Save</PrimaryButton>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
