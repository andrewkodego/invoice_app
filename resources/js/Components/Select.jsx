import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function Select(
    {id, name, handleChange, className, options, placeholder, required, value, isFocused, optionLabel='opt_name', optionValue='opt_id' },
    ref
) {
    const select = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            select.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <select
                value={value} 
                className={
                    `border-gray-300 focus:border-indigo-200 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm sm:text-sm` +
                    className
                }
                name={name}
                required={required}
                id={id}
                onChange={handleChange}>
                <option>{placeholder}</option>
                {options.map((item, index) => {
                    return (
                        <option key={index} value={item[optionValue]}>
                            {item[optionLabel]}
                        </option>
                    );
                })}
            </select>
        </div>
    );
});
