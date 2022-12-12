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

    const [fieldData, setFieldData] = useState({id: 0, _token: props.csrf_token});

    const handleChange = (event) => {
        const fieldName = event.target.name;
        const fieldValue = event.target.value;
        setFieldData(values=>({...values, [fieldName]: fieldValue}));
    }

    const onSaveHandler = (event) =>{

        Inertia.post(route('invoices.store'), fieldData,
        {
            preserveState: true,
            replace: true,
        }); 
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
                                <TextInput id="invoice_number" type="hidden"
                                            name="id"
                                            value={props.invoice.inv_id > 0 ? props.invoice.inv_id : 0}
                                            handleChange={handleChange}
                                        />
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <InputLabel for="invoice_number" value="Invoice #"/>

                                        <TextInput id="invoice_number" className="mt-1 block w-full"
                                            name="invoice_number"
                                            value={props.invoice.inv_number}
                                            handleChange={handleChange}
                                            required
                                            autofocus 
                                        />

                                    </div>
                                    <div>
                                        <InputLabel for="invoice_to" value="Invoice To"/>

                                        <TextInput id="invoice_to" className="mt-1 block w-full"
                                            name="invoice_to"
                                            value={props.invoice.inv_to}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <InputLabel for="contact_number" value="Contact #"/>

                                        <TextInput id="contact_number" className="mt-1 block w-full"
                                            name="contact_number"
                                            value={props.invoice.inv_contact_number}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>

                                    <div>
                                        <InputLabel for="invoice_date" value="Invoice Date"/>

                                        <TextInput id="invoice_date" className="mt-1 block w-full"
                                            type="date"
                                            name="invoice_date"
                                            value={props.invoice.inv_contact_number}
                                            handleChange={handleChange}
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div>
                                        <InputLabel for="currency" value="Currency"/>

                                        <select id="currency" className="mt-1 block w-full" name="currency" onChange={handleChange}>
                                            <option value=''>-- Select Currency --</option>    
                                            {props.currencyList.map((item)=>
                                                <option value={item.cur_id}>{item.cur_code}</option>    
                                            )}
                                        </select>
                                        
                                    </div>

                                    <div>
                                        <InputLabel for="status" value="Status"/>

                                        <select id="status" className="mt-1 block w-full" name="status" onChange={handleChange}>
                                            <option value=''>-- Select Status --</option>    
                                            {props.statusList.map((item)=>
                                                <option value={item.opt_id}>{item.opt_name}</option>    
                                            )}
                                        </select>
                                        
                                    </div>
                                    <div>
                                        <InputLabel for="payment_mehtod" value="Payment Method"/>

                                        <select id="payment_mehtod" className="mt-1 block w-full" name="payment_method" onChange={handleChange}>
                                            <option value=''>-- Select Payment Method --</option>    
                                            {props.paymentMethodList.map((item)=>
                                                <option value={item.opt_id}>{item.opt_name}</option>    
                                            )}
                                        </select>
                                        
                                    </div>
                                </div>
                                <div>
                                    <InputLabel for="delivery_address" value="Delivery Address"/>

                                    <textarea id="delivery_address" name="delivery_address" className="mt-1 block w-full" onChange={handleChange}>
                                        {props.invoice.inv_delivery_address}
                                    </textarea>
                                    
                                </div>

                            </form>

                            <div class="grid grid-cols-10 gap-0">
                                <Link className="flex items-center px-6 py-4 focus:text-indigo-500" href={`/invoices`}>
                                    Cancel
                                </Link>
                                <PrimaryButton className="px-2 py-1" onClick={onSaveHandler}>Save</PrimaryButton>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    );
}
